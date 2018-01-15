@extends('layouts.dashboardL')

@section('title')
    Kelas
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{isset($kelas->id) ? 'Edit Data ' : 'Tambah Data Kelas'}}</div>
        <div class="panel-body">
            {{ isset($kelas->id) ? Form::open(['action' => ['KelasController@store', $kelas->id], 'method' => 'PUT']) : Form::open(['url' => '/dashboard/kelas/', 'method' => 'POST']) }}
                <div class="form-group">
                    <div class="input-group">
                        {{ Form::label('nama', 'Nama Kelas', ['class' => 'control-label']) }}
                        {{ Form::text('nama', isset($kelas->nama) ? $kelas->nama : null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-4">
                        {{ Form::submit(isset($kelas->id) ? 'Update' : 'Tambah') }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection