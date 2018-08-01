@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h4>
            <a href="{{ route('suppliers.index') }}">
                Suppliers
            </a>
            <small>
               /  Edit
            </small>
        </h4>
    </div>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        @include('suppliers.partial.form')

        <div class="form-group text-right">
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
@stop
