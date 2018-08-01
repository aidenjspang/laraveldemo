@extends('layouts.app')

@section('content')
    @php $viewName = 'emails.index'; @endphp

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
            display: block;
            overflow-x: auto;
            white-space: nowrap;
            min-height: 550px;
        }
    </style>

    <div class="page-header">
        <h4>
            Email LOG
        </h4>
    </div>

    <div class="row">
        <form method="get" action="{{ route('emails.index') }}" role="search">
            <div class="col-md-2 mb-2 text-left">
                <div class="input-group date" id="datetimepicker1">
                    <input type="text" name="search_date" value="" class="form-control" placeholder="DATE SENT EMAIL"/>
                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="col-md-1 text-left" style="padding-left: 0px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Search
                </button>
            </div>
        </form>
    </div>


    <div class="row container__article" style="padding-top: 0.35em;">
        <div class="col-md-12 list__article" style="overflow-x: auto !important">
            <table class="table striped display nowrap" id="master-table" style="">
                <thead class="thead-light">
                    <tr>
                        <th class="text-left">REF #</th>
                        <th class="text-left">SERVICE ID</th>
                        <th class="text-left">DATETIME SENT</th>
                        <th class="text-left">SENDER</th>
                        <th class="text-left">SUPPLIER</th>
                        <th class="text-left">RECEIVER</th>
                        <th class="text-left">EMAIL TITLE</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($emaillogs as $emaillog)
                        <tr class=''>
                            <td class="text-left">{{ $emaillog->booking_id }}</td>
                            <td class="text-left">{{ $emaillog->service_id }}</td>
                            <td class="text-left">{{ $emaillog->created_at }}</td>
                            <td class="text-left">{{ $emaillog->sender }}</td>
                            <td class="text-left">{{ $emaillog->supplier }}</td>
                            <td class="text-left">{{ $emaillog->receiver }}</td>
                            <td class="text-left">{{ $emaillog->subject }}</td>
                        </tr>
                    @empty
                        <p class="text-center text-danger">
                            {{ trans('forum.articles.empty') }}
                        </p>
                    @endforelse
                </tbody>
            </table>

            @if($emaillogs->count())
                <div class="text-center paginator__article">
                    {!! $emaillogs->appends(request()->except('page'))->render() !!}
                </div>
            @endif
        </div>
    </div>
@stop


@section('script')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                useCurrent: true,
                format:'DD/MM/YYYY'
            });
        });
    </script>
@stop
