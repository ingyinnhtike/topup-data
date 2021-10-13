<!-- Merchant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_id', 'Merchant:') !!}

    {!! Form::select('merchant_id', $merchants->pluck('name','id'), null,['class' => 'form-control', 'placeholder'=> 'Select Merchant']) !!}
</div>

<!-- Service Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_name', 'Service Name:') !!}

    {!! Form::text('service_name', null, ['class' => 'form-control']) !!}
</div>

<!-- MPSS -->
<div class="form-group col-sm-6">
    {!! Form::label('service_type', 'Service Type:') !!}

    {!! Form::select('service_type', ['Data' => 'Data', 'Top Up' => 'Top Up'], null,['class' => 'form-control', 'placeholder'=> 'Select Service Type', 'required' =>  'required' ]) !!}
</div>

<!-- Amount -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Top Up Amount:') !!}

    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Call Back URL Field -->
<div class="form-group col-sm-12">
    {!! Form::label('CallBackUrl', 'CallBackUrl:') !!}

    {!! Form::text('CallBackUrl', null, ['class' => 'form-control']) !!}
</div>

<!-- MPT Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mpt_package_id', 'MPT:') !!}

    {!! Form::select('mpt_package_id', $packagesMPT->pluck('volume','id'), null,['class' => 'form-control', 'placeholder'=> 'Select MPT Package']) !!}
</div>

<!-- Ooredoo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ooredoo_package_id', 'Ooredoo:') !!}

    {!! Form::select('ooredoo_package_id', $packagesOoredoo->pluck('volume','id'), null,['class' => 'form-control', 'placeholder'=> 'Select Ooredoo Package']) !!}
</div>

<!-- Telenor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telenor_package_id', 'Telenor:') !!}

    {!! Form::select('telenor_package_id', $packagesTelenor->pluck('volume','id'), null,['class' => 'form-control', 'placeholder'=> 'Select Telenor Package']) !!}
</div>

<!-- Mytel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('myTel_package_id', 'Mytel:') !!}

    {!! Form::select('myTel_package_id', $packagesMytel->pluck('volume','id'), null,['class' => 'form-control', 'placeholder'=> 'Select Mytel Package']) !!}
</div>

<!-- MPSS -->
<div class="form-group col-sm-6">
    {!! Form::label('mpss_username', 'MPSS Username:') !!}

    {!! Form::text('mpss_username', null, ['class' => 'form-control']) !!}
</div>

<!-- MPSS -->
<div class="form-group col-sm-6">
    {!! Form::label('mpss_password', 'MPSS Password:') !!}

    {!! Form::text('mpss_password', null, ['class' => 'form-control']) !!}
</div>

<!-- MPSS -->
<div class="form-group col-sm-6">
    {!! Form::label('mpss_company_id', 'MPSS Company_id:') !!}

    {!! Form::text('mpss_company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- MPSS -->
<div class="form-group col-sm-6">
    {!! Form::label('mpss_key', 'MPSS Key:') !!}

    {!! Form::text('mpss_key', null, ['class' => 'form-control']) !!}
</div>

<!-- BP Username -->
<div class="form-group col-sm-6">
    {!! Form::label('bp_username', 'BP Username:') !!}

    {!! Form::text('bp_username', null, ['class' => 'form-control']) !!}
</div>

<!-- BP Password -->
<div class="form-group col-sm-6">
    {!! Form::label('bp_password', 'BP Password:') !!}

    {!! Form::text('bp_password', null, ['class' => 'form-control']) !!}
</div>

<!-- Status -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Active:') !!}

    {{ Form::checkbox('status', 0,false) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

    <a href="{!! route('admin.services.index') !!}" class="btn btn-default">Cancel</a>
</div>
