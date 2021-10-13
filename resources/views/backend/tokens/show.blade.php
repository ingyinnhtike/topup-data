@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Merchants
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px"><!-- Id Field -->
                    <div class="form-group">
                        {!! Form::label('id', 'Merchant :') !!}
                        <p>{!! $passwordGrantTokens->merchants->name !!}</p>
                    </div>
                <?php $token = json_decode($passwordGrantTokens->tokens);?>
                <!-- Name Field -->
                    <div class="form-group">
                        {!! Form::label('token_type', 'token_type:') !!}
                        <p>{!! $token->token_type !!}</p>
                    </div>

                    <!-- Address Field -->
                    <div class="form-group">
                        {!! Form::label('expires_in', 'expires_in:') !!}
                        <p>{!! $token->expires_in !!}</p>
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group">
                        {!! Form::label('access_token', 'access_token:') !!}
                        <p>{!! $token->access_token !!}</p>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        {!! Form::label('refresh_token', 'refresh_token:') !!}
                        <p>{!! $token->refresh_token !!}</p>
                    </div>
                    <a href="{!! route('admin.tokens.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection