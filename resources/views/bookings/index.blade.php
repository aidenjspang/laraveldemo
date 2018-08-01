@extends('layouts.app')

@section('content')
    @php $viewName = 'bookings.index'; @endphp

    <style>
        .un-notice {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        #master-table tr:hover {
            background-color: #f1f1f1;
        }
        /*
        #master-table td:hover {
            cursor: pointer;
        }
        */
        .normal-status {
            padding: 7px 16px;
            font-size: 13px;
            margin-top: 7px;
            display: inline-flex;
            line-height: 1.2em !important;
            color: #fff;
            background: #69D2E7;
            border-radius: 2px;
            border-bottom: 1px solid rgba(0,0,0,.05);
            white-space: nowrap;
        }
        .send-email {
            background-color: #EDC951;
            border-color: #EDC951;
        }
        .view-tranx {
            font-weight: 500;
            padding-left: 30px;
            padding-right: 30px;
            background-color: #2ab27b;
            border-color: #259d6d;
        }
        .view-tranx a, .send-email a {
            color: #fff;
            text-decoration: none !important;
        }
        .assigned-status {
            background: #c8d7e1 !important;
            color: #fff !important;
        }
        .cancel-status {
            background: #bf5329 !important;
            color: #fff !important;
        }
        table.table {
            width: auto;
            margin-top: 5px;
            background-color: #fff;
            border: 1px solid #e3e7ea;
            display: block;
            overflow-x: auto;
            white-space: nowrap;
            min-height: 550px;
        }
    </style>

    <div class="page-header">
        <h4>
            Bookings
        </h4>
    </div>

    <div class="row">
        <form method="get" action="{{ route('bookings.index') }}" role="search">
            <div class="col-md-2 mb-1 text-left">
                <div class="input-group date" id="datetimepicker1">
                    <input type="text" name="search_date_from" value="<?php echo isset($_GET['search_date_from']) ? $_GET['search_date_from'] : '' ?>" class="form-control" placeholder="From Service Date"/>
                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="col-md-2 mb-1 text-left" style="padding-left: 0px;">
                <div class="input-group date" id="datetimepicker2">
                    <input type="text" name="search_date_end" value="<?php echo isset($_GET['search_date_end']) ? $_GET['search_date_end'] : '' ?>" class="form-control" placeholder="End Service Date"/>
                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="col-md-1 mb-1 text-left" style="padding-left: 0px;">
                <div class="input-group">
                    <select name="search_city" id="search_city" class="form-control" style=""width: 100%;">
                    <option value="99">All Cities</option>
                    <?php $old_search_city = isset($_GET['search_city']) ? $_GET['search_city'] : '' ?>
                    @foreach($allCity as $city)
                        <option value="{{ $city->city_code }}"
                                @if ($city->city_code == $old_search_city))
                                selected="selected"
                                @endif
                        >{{ $city->city_name }}
                        </option>
                        @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-1 text-left" style="padding-left: 0px;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-search"></i>
                    Search
                </button>
            </div>
            <div class="col-md-1 text-left" style="padding-left: 0px;">
                <div class="btn-group sort__article">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="width: 100%;">
                        <i class="fa fa-sort"></i>
                        {{ trans('forum.articles.sort') }}
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu">
                        @foreach(config('project.sorting') as $column => $text)
                            <li {!! request()->input('sort') == $column ? 'class="active"' : '' !!}>
                                {!! link_for_sort($column, $text) !!}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </form>
        <div class="col-md-5 text-right">
            <a href="{{ route('bookings.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                New Booking
            </a>
        </div>
    </div>


    <div class="row container__article" style="padding-top: 0.35em;">
        <div class="col-md-12 list__article" style="overflow-x: auto !important">
            <table class="table striped display nowrap" id="master-table" style="">
                <thead class="thead-light">
                <tr>
                    <th class="text-center">REF #</th>
                    <th class="text-left">CREATED DATE</th>
                    <th class="text-left">STATUS</th>
                    <th class="text-center"></th>
                    <th class="text-right">Email #</th>
                    <!--
                    <th class="text-left">NOTICE TO THE</th>
                    -->
                    <th class="text-left">SUPPLIER</th>
                    <th class="text-left">SERVICE ID</th>
                    <th class="text-left">CUSTOMER</th>
                    <th class="text-right">GUEST #</th>
                    <th class="text-left">SERVICE DATE</th>
                    <th class="text-left">CITY</th>
                    <th class="text-left">ARR/DEP</th>
                    <th class="text-left">VEHICLE</th>
                    <th class="text-left">FLIGHT</th>
                    <th class="text-left">PAID SUPPLIER</th>
                    <th class="text-left">HOTELBED INVOICE</th>
                    <th class="text-left">HOTELBED PAID</th>
                    <th class="text-right">PRICE</th>
                    <th class="text-right">COST</th>
                    <th class="text-right">PROFIT</th>
                    <th class="text-left">CONTACT #</th>
                    <th class="text-left">ROUTE</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bookings as $booking)
                    <!-- <tr class='clickable-row' data-href='{{ route('bookings.show', $booking->id) }}'>  -->
                    <tr>
                        <td class="text-center">{{ $booking->id }}</td>
                        <td class="text-left">{{ Carbon\Carbon::parse($booking->created_at)->format('d/m/Y') }}</td>
                        <td class="text-left" style="padding: 1px 0;">
                            @if ($booking->status_code == 1 && $booking->supplier_id != 1)
                                <mark class="normal-status assigned-status">
                                    @elseif ($booking->status_code == 2 )
                                        <mark class="normal-status cancel-status">
                                            @else
                                                <mark class="normal-status">
                                                    @endif

                                                    <span>
                                    @if ($booking->status_code == 1 && $booking->supplier_id != 1)
                                                            Assigned
                                                        @elseif ($booking->status_code == 2 )
                                                            Cancelled
                                                        @else
                                                            Requested
                                                        @endif
                                </span>
                        </td>
                        <td class="text-center" style="padding-top: 1px;">
                            <a href="{{ route('bookings.show', $booking->id) }}"><mark class="normal-status view-tranx">View</a>
                        </td>
                        <td class="text-right">{{ $booking->sent_count }}</td>
                        <!--
                        <td class="text-center" style="padding-top: 1px;">
                            @if ($booking->supplier_id != 1)
                                <a href="{{ route('bookings.emailtosupplier', $booking->id, 1) }}"><mark class="normal-status send-email">Send Email</a>
                            @else
                            @endif
                        </td>
                        -->
                        <td class="text-left">
                            @if ($booking->supplier_id != 1)
                                {{ $booking->supplier->nick_name }}
                            @endif
                        </td>
                        <td class="text-left">{{ $booking->service_id }}</td>
                        <td class="text-left">{{ $booking->customer_name }}</td>
                        <td class="text-right">{{ $booking->number_of_guest }}</td>
                        <td class="text-left">{{ Carbon\Carbon::parse($booking->request_datetime)->format('d/m/Y H:i A') }}</td>
                        <td class="text-left">
                            @foreach($allCity as $city)
                                {{ $booking->city == $city->city_code ?  $city->city_name : '' }}
                            @endforeach
                        </td>
                        <td class="text-left">
                            @foreach($allPickup as $key => $value)
                                {{ $booking->arr_dep == $key ?  $value : '' }}
                            @endforeach
                        </td>
                        <td class="text-left">
                            @foreach($allVehicle as $key => $value)
                                {{ $booking->vehicle_code == $key ?  $value : '' }}
                            @endforeach
                        </td>
                        <td class="text-left">{{ $booking->flight_number }}</td>
                        <td class="text-left">
                            @foreach($paid_to_supplier_array as $key => $value)
                                <?php $booking->paid_to_supplier == $key ?  $v_paid_to_supplier = $value : '' ?>
                            @endforeach
                            {{ $v_paid_to_supplier }}
                        </td>
                        <td class="text-left">
                            @foreach($hotelbeds_invoice_array as $key => $value)
                                <?php $booking->hotelbeds_invoice == $key ?  $v_hotelbeds_invoice = $value : '' ?>
                            @endforeach
                            {{ $v_hotelbeds_invoice }}
                        </td>
                        <td class="text-left">
                            @foreach($hotelbeds_paid_array as $key => $value)
                                <?php $booking->hotelbeds_paid == $key ?  $v_hotelbeds_paid = $value : '' ?>
                            @endforeach
                            {{ $v_hotelbeds_paid }}
                        </td>
                        <td class="text-right">{{ $booking->hotel_bed_price }}</td>
                        <td class="text-right">{{ $booking->price_fm_supplier }}</td>
                        <td class="text-right">{{ $booking->hotel_bed_price - $booking->price_fm_supplier }}</td>
                        <td class="text-left">{{ $booking->customer_contact_no }}</td>
                        <td class="text-left">{{ $booking->content }}</td>
                        <td style="display:none;">
                            {{ $booking->supplier_id  }}
                        </td>
                    </tr>
                @empty
                    <p class="text-center text-danger">
                        {{ trans('forum.articles.empty') }}
                    </p>
                @endforelse
                </tbody>
            </table>

            @if($bookings->count())
                <div class="text-center paginator__article">
                    {!! $bookings->appends(request()->except('page'))->render() !!}
                </div>
            @endif
        </div>
    </div>
@stop


@section('script')
    <!--
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    -->


    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                useCurrent: true,
                format:'DD/MM/YYYY'
            });
            $('#datetimepicker2').datetimepicker({
                useCurrent: true,
                format:'DD/MM/YYYY'
            });
        });
    </script>
    <script type="text/javascript">
        $("tr").each(function(){
            var notice_val = $(this).find("td:eq(3)").text().trim();

            if (notice_val == 0){
                $(this).addClass('un-notice');  //the selected class colors the row green//
            } else {
            }
        });
    </script>
@stop
