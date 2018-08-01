<p>Dear {{ $supplier->contact_name }},</p>
<p>Please book and confirm the following.</p>
<p>Reference Number: {{ $booking->id }}</p>
<p>Customer Name: {{ $booking->customer_name }}</p>
<p>Service ID: {{ $booking->service_id }}</p>
<p>Contact Number: {{ $booking->customer_contact_no }}</p>
<p>Service Date: {{ $booking->request_datetime }}</p>
<p>Number of Guest: {{ $booking->number_of_guest }}</p>
<p>City: @foreach($allCity as $city)
            @if ($city->city_code == old('city', $booking->city))
                {{ $city->city_name }}
            @endif
         @endforeach
</p>
<p>ARR/DEP: @foreach($allPickup as $key => $value)
        @if ($key == $booking->arr_dep)
            {{ $value }}
        @endif
    @endforeach
</p>
<p>Vehicle: @foreach($allVehicle as $key => $value)
        @if ($key == $booking->vehicle_code)
            {{ $value }}
        @endif
    @endforeach
</p>
<p>Flight Number: {{ $booking->flight_number }}</p>
<p>Route: {{ $booking->content }}</p>
<p>Note: {{ $booking->note_supplier }}</p>
<br>
<small>
Kind Regards<br>
Maha<br>
Maha Youssef<br>
Reservations Manager<br>
JC limousines Pty Ltd<br>
4 Columbia Court<br>
Baulkham Hills<br>
NSW 2153<br>
Tel:  (+61 2) 9846 1466<br>
Fax: (+61 2) 9846 1499<br>
Web: www.jclimousines.com.au<br>
</small>


