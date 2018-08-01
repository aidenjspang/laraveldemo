@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h4>
            <a href="{{ route('suppliers.index') }}">
                Supplier
            </a>
            <small>
                / New Supplier
            </small>
        </h4>
    </div>

    <div class="row ">
        <div class="col-md-12 list__article">
            <article data-id="1212" id="item__article">
                <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data" class="form__article">
                    {!! csrf_field() !!}

                    @include('suppliers.partial.form')

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