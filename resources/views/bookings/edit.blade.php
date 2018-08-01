@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h4>
            <a href="{{ route('bookings.index') }}">
                Bookings
            </a>
            <small>
               /  Edit
            </small>
        </h4>
    </div>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        @include('bookings.partial.form')
        @include('bookings.partial.budget')

        <div class="form-group text-right">
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
@stop
