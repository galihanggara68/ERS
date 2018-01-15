@extends('layouts.dashboardL')

@section('title')
    Jurusan
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{isset($data->id) ? 'Edit Data Jurusan' : 'Tambah Data Jurusan'}}</div>
        <div class="panel-body">
            {{ isset($jurusan->id) ? Form::open(['action' => ['JurusanController@store', $jurusan->id], 'method' => 'PUT']) : Form::open(['url' => '/dashboard/jurusan/', 'method' => 'POST']) }}
                <div class="form-group">
                    <div class="input-group">
                        {{ Form::label('nama', 'Nama Jurusan', ['class' => 'control-label']) }}
                        {{ Form::text('nama', isset($jurusan->nama) ? $jurusan->nama : null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-4">
                        {{ Form::submit(isset($jurusan->id) ?  'Update' : 'Tambah') }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection