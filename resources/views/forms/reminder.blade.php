@extends('layouts.main')
<style>
    .panel{
        margin-top:120px;
        margin-left:auto;
    }
</style>
@section('content')
    <div class="panel panel-default col-md-offset-3 col-md-8" align="center">
        <div class="panel-heading">Atur Ulang Password</div>
        <div class="panel-body">
            {{ Form::open(['route' => 'reminder.store']) }}
            <div class="form-group">
                <div class="inline-from">
                    {{ Form::email('email', null, ['class' => 'form-control col-xs-5', 'placeholder' => 'Masukan Email Anda']) }}
                    {{ Form::submit('Kirim', ['class' => 'btn btn-lg btn-default col-md-offset-4 col-md-4']) }}
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection