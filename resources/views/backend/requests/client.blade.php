@extends('layouts.app')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}

    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
    <style>
        input[type="date"].form-control, input[type="time"].form-control, input[type="datetime-local"].form-control, input[type="month"].form-control {
            line-height: 20px !important;
        }
        .popover {
            min-width: 289px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="{!! route('admin.otp.search.client') !!}" method="POST" class="form-inline" role="search">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="txtStartDate"> Start Date : </label>
                        <input type="test" name="txtStartDate" placeholder="MM/DD/YYYY" class="form-control ml-5" id="txtStartDate"
                               value="{{ (!empty($query2)) ? $query2 : '' }}"/>
                    </div>
                    <div class="form-group ml-5">
                        <label for="txtEndDate"> End Date : </label>
                        <input type="test" name="txtEndDate" placeholder="MM/DD/YYYY" class="form-control ml-5" id="txtEndDate"
                               value="{{ (!empty($query3)) ? $query3 : '' }}"/>
                    </div>

                    <div class="form-group ml-5" >
                        <input type="text" class="form-control" name="q" id="q" placeholder="Search">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Filter" class="btn-primary btn ml-10"/>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <form class="form-horizontal" v-show="(show != 0) && (show != 3)" target="_blank" action="{!! route('admin.otp.download.client') !!}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="ext" value="xls">
            <input type="hidden" class="form-control" name="q" id="q" value="{{ $query }}">
            <input type="hidden" class="form-control" name="txtStartDate" id="txtStartDate" value="{{ $query2 }}">
            <input type="hidden" class="form-control" name="txtEndDate" id="txtEndDate" value="{{ $query3 }}">
            <button type="submit" class="btn btn-success btn-xs">Download</button>
        </form>
        <br>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="wrapper2">
                    <div class="div2">
                        <table id="packages-table" class="no-print table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>Merchant Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Merchant Request Id</th>
                                <th>Transaction Id</th>
                                <th>Phone</th>
                                <th>Operator</th>
                                <th>Service Name</th>
                                <th>Package Name</th>
                                <th>Volume</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Description</th>


                                {{--<th>request_id</th>--}}
                                {{--<th>Merchant</th>--}}
                                {{--<th>Service</th>--}}
                                {{--<th>Phone</th>--}}
                                {{--<th>code</th>--}}
                                {{--<th>code_expiry</th>--}}
                                {{--<th>count</th>--}}
                                {{--<th>Ban Time</th>--}}
                                {{--<th>Callback Status</th>--}}
                                {{--<th>Boom Status</th>--}}
                                {{--<th>Boom Message Id</th>--}}
                                {{--<th>Boom Phone</th>--}}
                                {{--<th>Boom Remaining Balance</th>--}}
                                {{--<th>Boom Message Count</th>--}}
                                {{--<th>Boom Client Ref</th>--}}
                                {{--<th>Boom Error Text</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$otpRequests->isEmpty())
                                @foreach($otpRequests as $otpRequest)
                                    <tr>
                                        <td>
                                            {{ $otpRequest->id }}
                                        </td>
                                        <td>{{ $otpRequest->merchant->name }}</td>
                                        <td>{{ $otpRequest->created_at }}</td>
                                        <td>{{ $otpRequest->updated_at }}</td>
                                        <td>{{ $otpRequest->merchant_request_id }}</td>
                                        <td>{{ $otpRequest->request_id }}</td>
                                        <td>{{ $otpRequest->to }}</td>
                                        <td>{{ $otpRequest->operator }}</td>
                                        <td>{{ $otpRequest->service->service_name }}</td>
                                        <td>{{ $otpRequest->packages->package_name }}</td>
                                        <td>{{ $otpRequest->packages->volume }}</td>
                                        <td>{{ $otpRequest->packages->price }}</td>
                                        <td>{{ $otpRequest->status }}</td>
                                        <td>{{ $otpRequest->description }}</td>
                                    </tr>
                                @endforeach
                            @else
                                {{ $message }}
                            @endif
                            </tbody>
                        </table>
                        @if($query == '' && $query2 != '' && $query3 != '')
                            {{ $otpRequests->appends( array (
                                'txtStartDate' => $query2,
                                'txtEndDate' => $query3,
                                'q' => ''
                            ) )->links()  }}
                        @elseif($query != '' && $query2 == '' && $query3 == '')

                            {{ $otpRequests->appends( array (
                                'txtStartDate' => '',
                                'txtEndDate' => '',
                                'q' => $query
                            ) )->links()  }}
                        @else($query != '' && $query2 != '' && $query3 != '')

                            {{ $otpRequests->appends( array (
                                'txtStartDate' => '',
                                'txtEndDate' => '',
                                'q' => ''
                            ) )->links()  }}
                        @endif
                    </div>
                    records : {{ $count }}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('after-scripts')
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
        var date_input=$('input[name="txtStartDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    </script>
    <script>
        var date_input=$('input[name="txtEndDate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    </script>
@endsection
