@extends('beautymail::templates.widgets')

@section('content')

    @include('beautymail::templates.widgets.newfeatureStart')

    <h3 class="secondary"><strong>Dear {{ $user->receiver }}</strong></h3>
    <h4> {{ $user->message }}</h4>

    @include('beautymail::templates.widgets.newfeatureEnd')

@stop