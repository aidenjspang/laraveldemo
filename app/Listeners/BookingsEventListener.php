<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use View;

class BookingsEventListener
{
    public function handle(\App\Events\BookingsEvent $event)
    {
        $booking = $event->booking;
        $supplier = $event->supplier;

        $view = 'emails.bookings.created';
        $v_subject = 'JC Limousines Booking Ref # '.$booking->id.'  - '.$booking->customer_name.'';

        $result = \Mail::queue(
            $view,
            compact('booking', 'supplier'),
            function ($message) use ($v_subject) {
                $message->from('reservations@jclimousines.com.au');
                $message->to('aiden@jctravel.com.au');
                $message->subject($v_subject);
            }
        );

        $emaillog = new \App\emaillog;
        $emaillog->booking_id = $booking->id;
        $emaillog->service_id = $booking->service_id;
        $emaillog->supplier = $supplier->supplier_name;
        $emaillog->sender = auth()->user()->email;
        $emaillog->receiver = $supplier->email;
        $emaillog->result = $result;

        DB::table('emaillogs')->insert(
            ['booking_id' => $emaillog->booking_id,
                'service_id' => $emaillog->service_id,
                'sender' => $emaillog->sender,
                'supplier' => $emaillog->supplier,
                'receiver' => $emaillog->receiver,
                'subject' => $v_subject,
                'result'  => $emaillog->result
            ]
        );

        $sent_count = $booking->sent_count + 1;

        DB::table('bookings')
            ->where('id', $booking->id)
            ->update(['sent_count' => $sent_count]);

        return $result;
    }
}

