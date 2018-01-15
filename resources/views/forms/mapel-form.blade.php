@extends('layouts.dashboardL')

@section('title')
    Mata Pelajaran
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{isset($data->id) ? 'Edit Data Mata Pelajaran' : 'Tambah Data Mata Pelajaran'}}</div>
        <div class="panel-body">
            {{ isset($mapel->id) ? Form::open(['action' => ['MapelController@store', $mapel->id], 'method' => 'PUT']) : Form::open(['url' => '/dashboard/mapel/', 'method' => 'POST']) }}
                <div class="form-group">
                    <div class="input-group">
                        {{ Form::label('nama', 'Nama Mapel', ['class' => 'control-label']) }}
                        {{ Form::text('nama', isset($mapel->nama) ? $mapel->nama : null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-4">
                        {{ Form::submit(isset($mapel->id) ? 'Tambah' : 'Update') }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection