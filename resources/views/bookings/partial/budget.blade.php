<div class="media">
    @include('bookings.partial.supplierview')

    <div class="budget-body" style="border-top: 1px solid #eeeeee;margin-top:5px;padding-top:15px;margin-bottom: 20px;">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">CURRENCY</label>
                    <select name="currency" id="currency" class="form-control">
                        @foreach($cur_array as $key => $value)
                            <option value="{{ $key }}" {{ $booking->currency == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">PAID TO SUPPLIER</label>
                    <select name="paid_to_supplier" id="paid_to_supplier" class="form-control">
                        @foreach($paid_to_supplier_array as $key => $value)
                            <option value="{{ $key }}" {{ $booking->paid_to_supplier == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <div class="form-group">
                    <label for="title">HOTELBEDS INVOICE</label>
                    <select name="hotelbeds_invoice" id="hotelbeds_invoice" class="form-control">
                        @foreach($hotelbeds_invoice_array as $key => $value)
                            <option value="{{ $key }}" {{ $booking->hotelbeds_invoice == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <div class="form-group">
                    <label for="title">HOTELBEDS PAID</label>
                    <select name="hotelbeds_paid" id="hotelbeds_paid" class="form-control">
                        @foreach($hotelbeds_paid_array as $key => $value)
                            <option value="{{ $key }}" {{ $booking->hotelbeds_paid == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="title">PRICE (HOTEL BED)</label>
                    <input type="text" name="hotel_bed_price" id="hotel_bed_price" value="{{ old('hotel_bed_price', $booking->hotel_bed_price) }}" class="form-control"/>
                    {!! $errors->first('hotel_bed_price', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group input-currency-symbol">
                    <label for="title">COST (SUPPLIER)</label>
                    <input type="text" name="price_fm_supplier" id="price_fm_supplier" value="{{ old('price_fm_supplier', $booking->price_fm_supplier) }}" class="form-control"/>
                    {!! $errors->first('price_fm_supplier', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

