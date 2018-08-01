
<div class="media">
    <div class="media-body">
        <div class="row">
            <div class="col-md-2 mb-3">
                <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                    <label for="title">REFERENCE #</label>
                    <input type="text" name="id" id="id" value="{{ old('id', $booking->id) }}" class="form-control" disabled/>
                    {!! $errors->first('id', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="form-group {{ $errors->has('status_code') ? 'has-error' : '' }}">
                    <label for="title">STATUS</label>
                    <select name="status_code" id="status_code" class="form-control">
                        @foreach($allStatus as $key => $value)
                            <option value="{{ $key }}"
                                    @if ($key == old('status_code', $booking->status_code))
                                    selected="selected"
                                    @endif
                            >{{ $value }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('status_code', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
                    <label for="title">SERVICE ID</label>
                    <input type="text" name="service_id" id="service_id" value="{{ old('service_id', $booking->service_id) }}" class="form-control"/>
                    {!! $errors->first('service_id', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                    <label for="title">CUSTOMER NAME</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" class="form-control"/>
                    {!! $errors->first('customer_name', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-group {{ $errors->has('customer_contact_no') ? 'has-error' : '' }}">
                    <label for="title">CONTACT NO</label>
                    <input type="text" name="customer_contact_no" id="customer_contact_no" value="" class="form-control"/>
                    {!! $errors->first('customer_contact_no', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="form-group {{ $errors->has('request_datetime') ? 'has-error' : '' }}">
                    <label for="title">SERVICE DATE</label>
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" name="request_datetime" value="{{ Carbon\Carbon::parse($booking->request_datetime)->format('d/m/Y H:i A') }}" class="form-control" />
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                    {!! $errors->first('request_datetime', '<span class="form-error" style="display: block;">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-1 mb-3">
                <div class="form-group {{ $errors->has('number_of_guest') ? 'has-error' : '' }}">
                    <label for="title">GUEST</label>

                    <select name="number_of_guest" id="number_of_guest" class="form-control">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}"
                                @if ($i == $booking->number_of_guest )
                                    selected="selected"
                                @endif
                            >{{ $i }}</option>
                        @endfor
                    </select>
                    {!! $errors->first('number_of_guest', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="title">CITY</label>
                    <select name="city" id="city" class="form-control">
                        @foreach($allCity as $city)
                            <option value="{{ $city->city_code }}"
                                @if ($city->city_code == old('city', $booking->city))
                                    selected="selected"
                                @endif
                            >{{ $city->city_name }}
                            </option>
                        @endforeach

                    </select>
                    {!! $errors->first('city', '<span class="form-error">:message</span>') !!}
                </div>
            </div>


            <div class="col-md-2 mb-3">
                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="title">ARR/DEP</label>
                    <select name="arr_dep" id="arr_dep" class="form-control">
                        @foreach($allPickup as $key => $value)
                            <option value="{{ $key }}"
                                    @if ($key == old('pickup_code', $booking->arr_dep))
                                    selected="selected"
                                    @endif
                            >{{ $value }}
                            </option>
                        @endforeach

                    </select>
                    {!! $errors->first('arr_dep', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <div class="form-group {{ $errors->has('vehicle_code') ? 'has-error' : '' }}">
                    <label for="title">VEHICLE</label>
                    <select name="vehicle_code" id="vehicle_code" class="form-control">
                        @foreach($allVehicle as $key => $value)
                            <option value="{{ $key }}"
                                @if ($key == old('vehicle_code', $booking->vehicle_code))
                                    selected="selected"
                                @endif
                            >{{ $value }}
                            </option>
                        @endforeach

                    </select>
                    {!! $errors->first('vehicle_code', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-2 mb-3">
                <div class="form-group {{ $errors->has('flight_number') ? 'has-error' : '' }}">
                    <label for="title">FLIGHT NUMBER</label>
                    <input type="text" name="flight_number" id="flight_number" value="{{ old('flight_number', $booking->flight_number) }}" class="form-control"/>
                    {!! $errors->first('flight_number', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="title">ROUTE</label>
                    <input name="content" value="{{ old('content', $booking->content) }}" class="form-control" >
                    {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group {{ $errors->has('note_supplier') ? 'has-error' : '' }}">
                    <label for="title">NOTE FOR SUPPLIER</label>
                    <input name="note_supplier" value="{{ old('note_supplier', $booking->note_supplier) }}" class="form-control" >
                    {!! $errors->first('note_supplier', '<span class="form-error">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
    @parent
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                //format: "YYYY-MM-DD hh:mm:ss"
                format:'DD/MM/YYYY HH:mm'
            });
        });
    </script>
@stop

