@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Merchants
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($merchants, ['route' => ['admin.merchants.update', $merchants->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('backend.merchants.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection