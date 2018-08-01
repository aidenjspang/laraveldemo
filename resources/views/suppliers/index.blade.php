@extends('layouts.app')

@section('content')
    @php $viewName = 'suppliers.index'; @endphp

    <style>
        .table > tbody > tr > td {
            padding: 9px;
            line-height: 20px;
            border-top: none;
        }
        .un-notice {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        #master-table tr:hover {
            background-color: #f1f1f1;
        }
        #master-table td:hover {
            cursor: pointer;
        }
        .normal-status {
            padding: 7px 16px;
            font-size: 13px;
            margin-top: 7px;
            display: inline-flex;
            line-height: 1.2em !important;
            color: #fff;
            background: #ffc107;
            border-radius: 3px;
            border-bottom: 1px solid rgba(0,0,0,.05);
            white-space: nowrap;
        }
        .assigned-status {
            background: #c8d7e1 !important;
            color: #111 !important;
        }
        .cancel-status {
            background: #bf5329 !important;
            color: #fff !important;
        }
        table.table {
            width: 100%;
            margin-top: 5px;
            background-color: #fff;
            border: 1px solid #e3e7ea;
            white-space: nowrap;
            min-height: 550px;
        }
    </style>

    <div class="page-header">
        <h4>
            Supplier
        </h4>
    </div>

    <div class="row">
        <div class="col-md-12 text-left">
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                New Supplier
            </a>
        </div>
    </div>


    <div class="row container__article" style="padding-top: 0.35em;">
        <div class="col-md-12 list__article" >
            <table class="table striped display " id="master-table" >
                <thead class="thead-light" style="background: #f2f2f2;">
                    <tr>
                        <th class="text-left">NAME</th>
                        <th class="text-left">COUNTRY</th>
                        <th class="text-left">CITY</th>
                        <th class="text-left">CONTACT NAME</th>
                        <th class="text-left">EMAIL</th>
                        <th class="text-left">PHONE</th>
                        <th class="text-left"></th>
                    </tr>
                </thead>
                <tbody style="width: 100%;">
                    @forelse($suppliers as $supplier)
                        <tr class='clickable-row' data-href='{{ route('suppliers.show', $supplier->id) }}'>
                            <td class="text-left">{{ $supplier->supplier_name }}</td>
                            <td class="text-left">{{ $supplier->country }}</td>
                            <td class="text-left">{{ $supplier->city }}</td>
                            <td class="text-left">{{ $supplier->contact_name }}</td>
                            <td class="text-left">{{ $supplier->email }}</td>
                            <td class="text-left">{{ $supplier->telephone }}</td>
                        </tr>
                    @empty
                        <p class="text-center text-danger">
                            {{ trans('forum.articles.empty') }}
                        </p>
                    @endforelse
                </tbody>
            </table>


        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@stop

