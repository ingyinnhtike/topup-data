@extends('layouts.app')

@section('css')
    <style>
        /* hide up/down arrows ("spinners") on input fields marked type="number" */
        .no-spinners {
            -moz-appearance:textfield;
        }

        .no-spinners::-webkit-outer-spin-button,
        .no-spinners::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .myanmar3::-webkit-input-placeholder {
            font-family: 'Myanmar3';
        }

        .myanmar3:-moz-placeholder {
            font-family: 'Myanmar3';
        }
    </style>

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap-combobox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checkbox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Service
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($service, ['route' => ['admin.services.update', $service->id], 'method' => 'patch']) !!}

                        @include('backend.services.edit_field')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap-combobox.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.combobox').combobox()
        });
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

    <script>
        $(function () {
            $("#checkbox3").click(function () {
                if ($(this).is(":checked")) {
                    $("#min").show();
                    $("#max").show();
                    $("#min").val(null);
                    $("#max").val(null);

                } else {
                    $("#min").hide();
                    $("#max").hide();
                    $("#min").val(null);
                    $("#max").val(null);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            if ($("#checkbox3").is(":checked")) {
                $("#min").show();
                $("#max").show();
                $("#min").val(null);
                $("#max").val(null);

            } else {
                $("#min").hide();
                $("#max").hide();
                $("#min").val(null);
                $("#max").val(null);
            }

        });

    </script>
@endsection
