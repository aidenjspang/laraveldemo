@extends('layouts.app')

@section('content')
    @php $viewName = 'bookings.show'; @endphp

    <div class="page-header">
        <h4>
            <a href="{{ route('bookings.index') }}">
                Bookings
            </a>
            <small>
                / View
            </small>
        </h4>
    </div>

    <div class="row ">
        <div class="col-md-12 list__article">
            <booking id="item__article" data-id="{{ $booking->id }}" >
                @include('bookings.partial.booking', compact('bookings'))
            </booking>

            <div class="text-center action__article">
                @can('emailto', $booking)
                    <!--
                    <a href="{{ route('bookings.emailtosupplier', $booking->id) }}" class="btn btn-info">
                        <i class="fa fa-envelope"></i>
                        Email To Supplier Manually
                    </a>
                    -->
                    <button class="btn btn-info button__send_email">
                        <i class="fa fa-envelope"></i>
                        Email To Supplier Manually
                    </button>
                @endcan
                @can('update', $booking)
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-danger">
                        <i class="fas fa-pencil-alt"></i>
                        Edit
                    </a>
                @endcan
                @can('delete', $booking)
                    <button class="btn btn-danger button__delete">
                        <i class="fas fa-trash-alt"></i>
                        Delete
                    </button>
                @endcan
                <a href="{{ route('bookings.index') }}" class="btn btn-success">
                    <i class="fa fa-list"></i>
                    View List
                </a>
                <!--
                    <a href="{{ URL::previous() }}" class="btn btn-success">
                        <i class="fa fa-list"></i>
                        Go Back
                    </a>
                -->
            </div>

            <div class="container__comment">
                @include('comments.index')
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $('.button__send_email').on('click', function (e) {
            var supplier_id = {!! $booking->supplier_id !!}

            if (supplier_id == 1) {
                alert ("Please assign the supplier!");
            } else {
                window.location.href = '{{ route('bookings.emailtosupplier', $booking->id) }}';
            }
        });
        $('.button__delete').on('click', function (e) {
            var bookingId = $('booking').data('id');

            if (confirm('Delete ??')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/bookings/' + bookingId
                }).then(function () {
                    window.location.href = 'http://bms.jclimousines.com.au/bookings';
                });
            }
        });
    </script>
@stop