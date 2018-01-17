@extends('layouts.main')
<style>
    .content{
        margin-top: 150px;
    }
</style>
@section('content')
<div class="col-xs-offset-4 col-xs-6">
    <div class="panel panel-default" align="center">
        <div class="panel-heading"><h3>User Login</h3></div>
        <div class="panel-body">
            {{ Form::open(['route' => 'login']) }}
            <div class="form-group">
                <div class="row col-xs-8 input-group">
                    <span class="input-group-addon" id="basic-addon">Email</span>
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                </div>
            <div class="clear"></div>
            </div>

            <div class="form-group">
                <div class="row col-xs-8 input-group">
                    <span class="input-group-addon" id="basic-addon">Password</span>
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                </div>
            <div class="clear"></div>
            </div>

            <div class="form-group">
                <div class="row input-group">
                    {{ Form::label('remember', 'Ingat Saya', ['class' => '']) }}
                    {{ Form::checkbox('remember', null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="row input-group">
                    {{ link_to_route('reminder.create', 'Lupa Password', null,['class' => 'btn btn-link']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-outline-success col-xs-offset-4 col-xs-4']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection