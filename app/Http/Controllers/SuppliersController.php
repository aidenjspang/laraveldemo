<?php

namespace App\Http\Controllers;

use DB;
use App\Supplier;
use App\Http\Requests\SupplierRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use File;

class SuppliersController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Supplier::orderby('created_at', 'desc')->whereNotIn('ID', [1])->get();
        $suppliers = $query;

        return view('suppliers.index', compact('suppliers'));
    }

    public function supplier_query($id)
    {
        $supplier = DB::table('suppliers')->where('id', '=', $id)->get();

        return response()->json($supplier);
    }

    public function create()
    {
        $supplier = new \App\Supplier;

        return view('suppliers.create', compact('supplier'));
    }

    public function store(SupplierRequest $request)
    {
        $supplier = Supplier::create($request->all());

        return redirect(route('suppliers.index'))->with('flash_message', 'Saved Booking');
    }


    public function edit(\App\Supplier $supplier)
    {
        $this->authorize('update', $supplier);

        return view('suppliers.edit', compact('supplier'));
    }

    public function update(\App\Http\Requests\SupplierRequest $request, \App\Supplier $supplier)
    {
        $supplier->update($request->all());

        flash()->success('Saved.');

        return redirect(route('suppliers.show', $supplier->id));
    }

    public function show(\App\Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function destroy(Request $request, \App\Supplier $supplier)
    {
        $this->authorize('delete', $supplier);
        $supplier->delete();

        flash()->success(
            'Deleted.'
        );
        return response()->json([], 204, [], JSON_PRETTY_PRINT);
    }
}
