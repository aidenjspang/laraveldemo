@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h4>
            <a href="{{ route('bookings.index') }}">
                Bookings
            </a>
            <small>
                / New Booking
            </small>
        </h4>
    </div>

    <div class="row ">
        <div class="col-md-12 list__article">
            <article data-id="1212" id="item__article">
                <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data" class="form__article">
                    {!! csrf_field() !!}

                    @include('bookings.partial.form')

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                    </div>
                </form>
            </article>
        </div>
    </div>
@stop