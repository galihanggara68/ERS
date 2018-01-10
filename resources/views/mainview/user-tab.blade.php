@extends('layouts.dashboardL')

@section('title')
Data User
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissable fade" role="alert">
        <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif
@if(isset($user))
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>{{ $user->name }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">{{ Form::label('nis', 'NIS :') }}</div>
                <div class="col-xs-9">{{ $user->name }}</div>
            </div>
            <div class="row">
                    <div class="col-xs-3">{{ Form::label('nama', 'Nama :') }}</div>
                    <div class="col-xs-9">{{ $user->email }}</div>
            </div>
        </div>
    </div>
@else
    <table class="table table-striped table-hover table-condensed table-fixed">
        <thead>
            <tr>
                <th class="col-xs-2">Name</th>
                <th class="col-xs-3">Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $user)
        <tr>
            <td class="col-xs-2">{{ $user->name }}</td>
            <td class="col-xs-3">{{ link_to_route('user.show', $user->email, $user->id) }}</td>
            <td>{{ link_to_route('user.edit', 'Edit', $user->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection