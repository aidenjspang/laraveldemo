@extends('layouts.app')

@section('content')
    @php $viewName = 'suppliers.show'; @endphp

    <div class="page-header">
        <h4>
            <a href="{{ route('suppliers.index') }}">
                Supplier
            </a>
            <small>
                / View
            </small>
        </h4>
    </div>

    <div class="row ">
        <div class="col-md-12 list__article">
            <supplier id="item__article" data-id="{{ $supplier->id }}" >
                @include('suppliers.partial.supplier', compact('suppliers'))
            </supplier>

            <div class="text-center action__article">
                @can('update', $supplier)
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-danger">
                        <i class="fa fa-pencil"></i>
                        Edit
                    </a>
                @endcan
                @can('delete', $supplier)
                    <button class="btn btn-danger button__delete"><i class="fa fa-trash-o"></i> Delete</button>
                @endcan
                <a href="{{ route('suppliers.index') }}" class="btn btn-default">
                    <i class="fa fa-list"></i>
                    View List
                </a>
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
        $('.button__delete').on('click', function (e) {
            var supplierId = $('supplier').data('id');

            if (confirm('Delete ??')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/lara/suppliers/' + supplierId
                }).then(function () {
                    window.location.href = 'http://dev.jcreal.com.au/lara/suppliers';
                });
            }
        });
    </script>
@stop