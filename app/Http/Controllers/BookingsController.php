<?php

namespace App\Http\Controllers;

use App\Booking;
use App\emaillog;
use App\Supplier;
use App\Status;
use App\City;
use DB;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\EmaillogRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use File;

class BookingsController extends Controller implements Cacheable
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cacheTags()
    {
        return 'bookings';
    }

    public function index(Request $request)
    {
        $query =  new Booking;

        $query = $query->orderBy(
            $request->input('sort', 'request_datetime'),
            $request->input('request_datetime', 'desc')
        );

        $keyword            = request()->input('qry');
        $search_date_from   = request()->input('search_date_from');
        $search_city        = request()->input('search_city');

        if ($keyword) {
            $qry_raw = 'MATCH(customer_name, service_id) AGAINST(? IN BOOLEAN MODE)';
            $query = $query->whereRaw($qry_raw, [$keyword]);
        } elseif($search_date_from) {
            $search_date_end = request()->input('search_date_end');

            if ($search_city <> 99) {
                $query = $query->whereRaw("city = ?", $search_city);
            }

            if ($search_date_end == "") {
                $search_date_end = '31/12/2020';
            }

            $v_search_date_from = \Carbon\Carbon::createFromFormat('d/m/Y', $search_date_from)->format('Y-m-d');
            $v_search_date_end = \Carbon\Carbon::createFromFormat('d/m/Y', $search_date_end)->format('Y-m-d');
            $query = $query->whereRaw("date(request_datetime) >= ? AND date(request_datetime) <= ?", array($v_search_date_from, $v_search_date_end));
        } elseif ( $search_city && $search_city <> 99) {
            $query = $query->whereRaw("city = ?", $search_city);
        } else {
        }

        $bookings = $query->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function index_email(Request $request)
    {
        $query =  new emaillog;

        $query = $query->orderBy(
            $request->input('sort', 'created_at'),
            $request->input('created_at', 'desc')
        );

        if ($search_date = request()->input('search_date')) {
            $v_search_date['request_datetime'] = \Carbon\Carbon::createFromFormat('d/m/Y', $search_date)->format('Y-m-d');
            $query = $query->whereDate('created_at', 'like', $v_search_date);
        } else {
        }

        $emaillogs = $query->paginate(10);

        return view('emails.index', compact('emaillogs'));
    }

    public function create()
    {
        $booking = new \App\Booking;

        return view('bookings.create', compact('booking'));
    }

    public function store(BookingRequest $request)
    {
        $v_request = $request->all();
        $request_datetime = $request->input('request_datetime');
        $v_request['request_datetime'] = \Carbon\Carbon::createFromFormat('d/m/Y H:i', $request_datetime)->format('Y:m:d H:i:s');

        $booking = Booking::create($v_request);

        return redirect(route('bookings.index'))->with('flash_message', 'Saved Booking');
    }

    public function edit(\App\Booking $booking)
    {
        $this->authorize('update', $booking);

        $id = $booking->supplier_id;

        $supplier = DB::table('suppliers')->find($id);

        /*  Code for select options at the blade */
        return view('bookings.edit', compact('booking', 'supplier'));
    }

    public function update(\App\Http\Requests\BookingRequest $request, \App\Booking $booking)
    {
        $v_request = $request->all();
        $request_datetime = $request->input('request_datetime');
        $v_request['request_datetime'] = \Carbon\Carbon::createFromFormat('d/m/Y H:i', $request_datetime)->format('Y:m:d H:i:s');

        $booking->update($v_request);

        flash()->success('Saved.');

        return redirect(route('bookings.show', $booking->id));
    }

    public function emailtosupplier($id)
    {
        //$booking = DB::table('bookings')->find($id);
        //$supplier = DB::table('suppliers')->find($booking->supplier_id);
        $booking = \App\Booking::where('id', $id)->first();
        $supplier = \App\Supplier::where('id', $booking->supplier_id)->first();

        $result = event(new \App\Events\BookingsEvent($booking, $supplier));

        if ($result ) {
            flash()->success('sent email successfully');
        } else  {
            flash()->success('sent email error');
        }

        // return redirect(route('bookings.index'));
        return redirect(route('bookings.show', $booking->id));
    }

    public function show(\App\Booking $booking)
    {
        $id = $booking->supplier_id;

        $supplier = DB::table('suppliers')->find($id);

        $comments = $booking->comments()
                    ->with('replies')
                    ->withTrashed()
                    ->whereNull('parent_id')
                    ->latest()->get();

        return view('bookings.show', compact('booking', 'comments', 'supplier'));
    }

    protected function respondCreated($booking)
    {
        flash()->success(
            'Created'
        );

        return view('bookings.show', compact('booking'));
    }

    public function destroy(\App\Booking $booking)
    {
        $booking->delete();

        flash()->success(
            'Deleted.'
        );
        return response()->json([], 204, [], JSON_PRETTY_PRINT);
    }
}
