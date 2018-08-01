<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => ['required'],
            'service_id' => ['required'],
            'content' => ['required'],
            'request_datetime' => ['date_format:"d/m/Y H:i"'],
            'price_fm_supplier' => ['regex:/^\d*(\.\d{1,2})?$/'],
            'hotel_bed_price' => ['regex:/^\d*(\.\d{1,2})?$/']

            /*
            'hotel_bed_price' => ['decimal', 'min:1' ],
            'customer_contact_no' => ['required'],
            'customer_email' => ['required'],
            'request_datetime' => ['required'],
            'status_code' => ['required'],
            'flight_number' => ['required'],
            'service_id' => ['required'],
            'content' => ['required'],
            'number_of_guest' => ['required', 'numeric', 'min:1' ],
            */
        ];
    }
}
