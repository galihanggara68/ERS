@extends('layouts.main')

@section('content')
<div class="panel panel-default col-md-offset-3 col-md-8" align="center">
        <div class="panel-heading">Atur Ulang Password</div>
        <div class="panel-body">
            {{ Form::open(['route' => ['reminder.update', $id, $code], 'method' => 'PUT']) }}
            <div class="form-group">
                <div class="inline-from">
                    {{ Form::password('password', ['class' => 'form-control col-xs-5', 'placeholder' => 'Masukan Password Baru Anda']) }}
                    @if(null != ($errors->first('password')))<div class="alert alert-danger">{{ $errors->first('password') }}</div>@endif
                </div>
            </div>
            <div class="form-group">
                <div class="inline-from">
                    {{ Form::password('password_confirmation', ['class' => 'form-control col-xs-5', 'placeholder' => 'Konfirmasi Password Baru Anda']) }}
                    @if(null != ($errors->first('password_confirmation')))<div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>@endif
                </div>
            </div>
            <div class="form-group">
                {{ Form::submit('Atur Ulang', ['class' => 'btn btn-default']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection