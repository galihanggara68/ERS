@extends('layouts.dashboardL')

@section('title')
    Daftar User Baru
@endsection

@section('content')
    {{ Form::open(['route' => 'user.store']) }}
        <div class="form-group">
            {{ Form::label('first_name', 'Nama Depan', ['class' => 'col-lg-4 control-label']) }}
            <div class="col-lg-5">
                {{ Form::text('first_name', null, ['class' => 'form-control']) }}
                <div class="text-danger">{{ $errors->first('firs_name') }}</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Nama Belakang', ['class' => 'col-lg-4 control-label']) }}
            <div class="col-lg-5">
                {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                <div class="text-danger">{{ $errors->first('last_name') }}</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email', ['class' => 'col-lg-4 control-label']) }}
            <div class="col-lg-5">
                {{ Form::email('email', null, ['class' => 'form-control']) }}
                <div class="text-danger">{{ $errors->first('email') }}</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password', ['class' => 'col-lg-4 control-label']) }}
            <div class="col-lg-5">
                {{ Form::password('password', null, ['class' => 'form-control']) }}
                <div class="text-danger">{{ $errors->first('password') }}</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="form-group">
            {{ Form::label('password_confirmation', 'Konfirmasi Password', ['class' => 'col-lg-4 control-label']) }}
            <div class="col-lg-5">
                {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="form-group">
            <div class="col-lg-5 center-block">
                {{ Form::submit('Registrasi') }}
            </div>
        </div>
    {{ Form::close() }}
@endsection