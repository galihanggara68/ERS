@extends('layouts.dashboardL')

@section('title')
Edit Data Guru
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Data {{ $guru->nama }}</h3>
    </div>
    <div class="panel-body">
        {{ Form::model($guru, ['route' => ['guru.update', $guru->id]]) }}
        <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                {{ Form::label('nip', 'NIP', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::number('nip', $guru->nip,['class' => 'form-control', 'readonly' => 'true']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nip') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('nama', 'Nama', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::text('nama', $guru->nama, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nama') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('wali', 'Wali Kelas', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('wali', $kelas, $guru->kelas->id, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('wali') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('kaprog', 'Kaprog', ['class' => 'col-xs-3', 'data-bind' => array_shift($kelas)]) }}
                <div class="col-xs-9">
                    {{ Form::select('kaprog', $jurusan, $guru->jurusan->id, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('jurusan') }}</span>
                </div>
            </div>
            <div class="form-group mapel-group">
                {{ Form::label('mapel', 'Mata Pelajaran', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9"><span id="__addmapel" class="btn btn-default glyphicon glyphicon-plus"> Tambah Mapel</span></div>
                <div class="row mapel-select col-xs-10 pull-right">
                    <div class="col-xs-4">
                        {{ Form::select('kelas[]', $kelas, isset($guru->kelas->id) ? $guru->kelas->id : null, ['class' => 'form-control']) }}
                        <span class="bg-danger text-danger">{{ $errors->first('mapel') }}</span>
                    </div>
                    <div class="col-xs-5">
                        {{ Form::select('mapel[]', $mapel, isset($guru->mapel->id) ? $guru->mapel->id : null, ['class' => 'form-control']) }}
                        <span class="bg-danger text-danger">{{ $errors->first('mapel') }}</span>
                    </div>
                    <div class="col-xs-1"><span id="__delmapel" class="btn btn-default glyphicon glyphicon-minus"></span></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    {{ link_to('/dashboard', 'Batal', ['class' => 'btn btn-default btn-block']) }}
                </div>
                <div class="col-xs-6">
                    {{ Form::submit('Ubah', ['class' => 'btn btn-info btn-block']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection