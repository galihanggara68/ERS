@extends('layouts.dashboardL')

@section('title')
Edit Data Siswa
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Data {{ $siswa->nama }}</h3>
    </div>
    <div class="panel-body">
        {{ Form::model($siswa, ['route' => ['siswa.update', $siswa->id]]) }}
        <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                {{ Form::label('nis', 'NIS', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::number('nis', $siswa->nis,['class' => 'form-control', 'readonly' => 'true']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nis') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('nama', 'Nama', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::text('nama', $siswa->nama, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nama') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('kelas', 'Kelas', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('kelas', $kelas, $siswa->kelas->id, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('kelas') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('jurusan', 'Jurusan', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('jurusan', $jurusan, $siswa->jurusan->id, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('jurusan') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('status', 'Status', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('status', array('aktif' => 'Aktif', 'non' => 'Non-Aktif'), $siswa->status, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('status') }}</span>
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