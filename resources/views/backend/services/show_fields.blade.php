<!-- Merchant Id Field -->
<div class="form-group">
    {!! Form::label('merchant_id', 'Merchant:') !!}
    <p>{!! $service->merchants->name !!}</p>
</div>

<!-- Service Name Field -->
<div class="form-group">
    {!! Form::label('service_name', 'Service Name:') !!}
    <p>{!! $service->service_name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('CallBackUrl', 'Callback Url:') !!}
    <p>{!! $service->CallBackUrl !!}</p>
</div>

<!-- MPT Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mpt_package_id', 'MPT:') !!}

    <p>{!! $service->packages->volume !!}</p>
</div>

<!-- Ooredoo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ooredoo_package_id', 'Ooredoo:') !!}

    <p>{!! $service->packages->volume !!}</p>
</div>

<!-- Telenor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telenor_package_id', 'Telenor:') !!}

    <p>{!! $service->packages->volume !!}</p>
</div>

<!-- Mytel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('myTel_package_id', 'Mytel:') !!}

    <p>{!! $service->packages->volume !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $service->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $service->updated_at !!}</p>
</div>

