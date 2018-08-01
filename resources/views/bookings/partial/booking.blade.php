<style>
    .form-control[disabled] {
        cursor: default;
    }
</style>

<div class="media-body">
    <div class="row">
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">REFERENCE #</label>
                <input type="text" name="id" id="id" value="{{ old('id', $booking->id) }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">STATUS</label>
                @foreach($allStatus as $key => $value)
                    <?php $booking->status_code == $key ?  $v_status = $value : '' ?>
                @endforeach
                <input type="text" name="status" id="status" value="{{ $v_status }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">SERVICE ID</label>
                <input type="text" name="service_id" id="service_id" value="{{ old('service_id', $booking->service_id) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">CUSTOMER NAME</label>
                <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">CONTACT NUMBER</label>
                <input type="text" name="customer_contact_no" id="customer_contact_no" value="{{ old('customer_contact_no', $booking->customer_contact_no) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="title">SERVICE DATE</label>
                <input type="text" name="request_datetime" id="request_datetime" value="{{ Carbon\Carbon::parse($booking->request_datetime)->format('d/m/Y H:i A') }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-1 mb-3">
            <div class="form-group">
                <label for="title">GUEST</label>
                <input type="text" name="number_of_guest" id="number_of_guest" value="{{ old('number_of_guest', $booking->number_of_guest) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">CITY</label>
                    @foreach($allCity as $city)
                        <?php $booking->city == $city->city_code ?  $v_city = $city->city_name : '' ?>
                    @endforeach
                <input type="text" name="city" id="city" value="{{ $v_city }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">ARR/DEP</label>
                @foreach($allPickup as $key => $value)
                <?php $booking->arr_dep == $key ?  $v_arr_dep = $value : '' ?>
                @endforeach
                <input type="text" name="arr_dep" id="arr_dep" value="{{ $v_arr_dep }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">VEHICLE</label>
                @foreach($allVehicle as $key => $value)
                    <?php $booking->vehicle_code == $key ?  $v_vehicle = $value : '' ?>
                @endforeach
                <input type="text" name="vehicle" id="vehicle" value="{{ $v_vehicle }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">FLIGHT NUMBER</label>
                <input type="text" name="flight_number" id="flight_number" value="{{ old('flight_number', $booking->flight_number) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="title">ROUTE</label>
                <input type="text" name="content" id="content" value="{{ old('flight_number', $booking->content) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group {{ $errors->has('note_supplier') ? 'has-error' : '' }}">
                <label for="title">NOTE FOR SUPPLIER</label>
                <input name="note_supplier" value="{{ old('note_supplier', $booking->note_supplier) }}" class="form-control" disabled >
                {!! $errors->first('note_supplier', '<span class="form-error">:message</span>') !!}
            </div>
        </div>
    </div>
</div>

<div class="budget-body" style="border-top: 1px solid #eeeeee;margin-top:5px;padding-top:15px;">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">SUPPLIER</label>
                <input type="text" name="supplier_name" id="supplier_name" value="{{ $supplier->nick_name }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">COMPANY NAME</label>
                <input type="text" name="ssuppliername" id="ssuppliername" value="{{ $supplier->supplier_name }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">COUNTRY</label>
                <input type="text" name="scountry" id="scountry" value="{{ $supplier->country }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">CITY</label>
                <input type="text" name="scity" id="scity" value="{{ $supplier->city }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">CONTACT PERSON</label>
                <input type="text" name="scontact_name" id="scontact_name" value="{{ $supplier->contact_name }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">EMAIL</label>
                <input type="text" name="semail" id="semail" value="{{ $supplier->email }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">CONTACT NUMBER</label>
                <input type="text" name="stelephone" id="stelephone" value="" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">ADDRESS</label>
                <input type="text" name="saddress" id="saddress" value="{{ $supplier->address }}" class="form-control" disabled/>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">MEMO</label>
                <input type="text" name="smemo" id="smemo" value="{{ $supplier->memo }}" class="form-control" disabled/>
            </div>
        </div>
    </div>
</div>

<div class="budget-body" style="border-top: 1px solid #eeeeee;margin-top:5px;padding-top:15px;">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">CURRENCY</label>
                @foreach($cur_array as $key => $value)
                    <?php $booking->currency == $key ?  $v_cur = $value : '' ?>
                @endforeach
                <input type="text" name="currency" id="currency" value="{{ $v_cur }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">PAID TO SUPPLIER</label>
                @foreach($paid_to_supplier_array as $key => $value)
                    <?php $booking->paid_to_supplier == $key ?  $v_paid_to_supplier = $value : '' ?>
                @endforeach
                <input type="text" name="paid_to_supplier" id="paid_to_supplier" value="{{ $v_paid_to_supplier }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">HOTELBEDS INVOICE</label>
                @foreach($hotelbeds_invoice_array as $key => $value)
                    <?php $booking->hotelbeds_invoice == $key ?  $v_hotelbeds_invoice = $value : '' ?>
                @endforeach
                <input type="text" name="hotelbeds_invoice" id="hotelbeds_invoice" value="{{ $v_hotelbeds_invoice }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title">HOTELBEDS PAID</label>
                @foreach($hotelbeds_paid_array as $key => $value)
                    <?php $booking->hotelbeds_paid == $key ?  $v_hotelbeds_paid = $value : '' ?>
                @endforeach
                <input type="text" name="hotelbeds_paid" id="hotelbeds_paid" value="{{ $v_hotelbeds_paid }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="title">PRICE (HOTEL BED)</label>
                <input type="text" name="customer_contact_no" id="customer_contact_no" value="{{ getAmountAttribute(old('customer_contact_no', $booking->hotel_bed_price)) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group input-currency-symbol">
                <label for="title">COST (SUPPLIER)</label>
                <input type="text" name="price_fm_supplier" id="price_fm_supplier" value="{{ getAmountAttribute(old('customer_name', $booking->price_fm_supplier)) }}" class="form-control" disabled/>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="title" style="color:red;">PROFIT</label>
                <input type="text" name="customer_contact_no" id="customer_contact_no" value="{{ getAmountAttribute($booking->hotel_bed_price -  $booking->price_fm_supplier) }}" class="form-control" disabled style="color:red;"/>
            </div>
        </div>

        <div class="col-md-2 mb-3" style="float: right;color:red;">
            <div class="form-group input-currency-symbol">
                <label for="title">EMAIL #</label>
                <input type="text" name="sent_count" id="sent_count" value="{{ $booking->sent_count }}" class="form-control" disabled style="color:red;"/>
            </div>
        </div>

    </div>
</div>


@section('script')
    @parent
    <script type="text/javascript">
        $('#supplier_id').click(function()
        {
            console.log('function call');
            $('.scountry').html('Loading please wait ...');
            var supplierId = $('#supplier_id').val();
            console.log(supplierId);

            $.ajax ({
                type: "GET",
                url: '/laraveldemo/supplier_query/' + supplierId,
                dataType:"json",
                success: function(item) {
                    $('#scountry').val(item[0].supplier_name);
                    $('#scity').val(item[0].city);
                    $('#scontact_name').val(item[0].contact_name);
                    $('#semail').val(item[0].email);
                    $('#stelephone').val(item[0].telephone);
                }
            });
        });
    </script>
@stop