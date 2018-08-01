
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
            <label for="title">Customer name</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="form-control"/>
            {!! $errors->first('customer_name', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('customer_contact_no') ? 'has-error' : '' }}">
            <label for="title">Customer Contact No</label>
            <input type="text" name="customer_contact_no" id="customer_contact_no" value="{{ old('customer_contact_no', $booking->customer_contact_no) }}" class="form-control"/>
            {!! $errors->first('customer_contact_no', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
            <label for="title">Customer Email</label>
            <input type="text" name="customer_email" id="customer_email" value="{{ old('customer_email', $booking->customer_email) }}" class="form-control"/>
            {!! $errors->first('customer_email', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('request_datetime') ? 'has-error' : '' }}">
            <label for="title">Day of Request</label>
            <div class="input-group date" id="datetimepicker1">
                <input type="text" name="request_datetime" value="{{ old('request_datetime', $booking->request_datetime) }}" class="form-control" />
                <span class="input-group-addon">Calendar</span>
            </div>
            {!! $errors->first('request_datetime', '<span class="form-error" style="display: block;">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('number_of_guest') ? 'has-error' : '' }}">
            <label for="title">Number of Guest</label>

            <select name="number_of_guest" id="number_of_guest" class="form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            {!! $errors->first('number_of_guest', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
            <label for="title">City</label>
            <select name="city" id="city" class="form-control">
                @foreach($city as $key => $value)
                <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
            {!! $errors->first('city', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('arr_dep') ? 'has-error' : '' }}">
            <label for="title">Arrival/Departure</label>
            <select name="arr_dep" id="arr_dep" class="form-control">
                @foreach($arr_dep as $key => $value)
                <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
            {!! $errors->first('arr_dep', '<span class="form-error">:message</span>') !!}

        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('vehicle_code') ? 'has-error' : '' }}">
            <label for="title">Vehicle</label>
            <select name="vehicle_code" id="vechicle_code" class="form-control">
                @foreach($vehicle as $key => $value)
                <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
            {!! $errors->first('vehicle_code', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
            <label for="title">Service ID</label>
            <input type="text" name="service_id" id="service_id" value="{{ old('service_id', $booking->service_id) }}" class="form-control"/>
            {!! $errors->first('service_id', '<span class="form-error">:message</span>') !!}
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="form-group {{ $errors->has('flight_number') ? 'has-error' : '' }}">
            <label for="title">Flight Number</label>
            <input type="text" name="flight_number" id="flight_number" value="{{ old('flight_number', $booking->flight_number) }}" class="form-control"/>
            {!! $errors->first('flight_number', '<span class="form-error">:message</span>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="title">Content</label>
    <input type="text" name="content" id="content" value="{{ old('content', $booking->content) }}" class="form-control"/>
    {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
</div>



@section('script')
@parent
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: "YYYY-MM-DD hh:mm"
        });
    });
</script>
@stop

