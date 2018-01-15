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
        @if(isset($siswa->id))
            {{ Form::model($siswa, ['route' => ['siswa.update', $siswa->id]]) }}
            <input type="hidden" name="_method" value="PUT">
        @else
            {{ Form::open(['action' => ['SiswaController@store'], 'method' => 'POST']) }}
        @endif
            <div class="form-group">
                {{ Form::label('nis', 'NIS', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::number('nis', isset($siswa->nis) ? $siswa->nis : null,['class' => 'form-control', 'readonly' => isset($siswa->id) ? true : false]) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nis') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('nama', 'Nama', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::text('nama', isset($siswa->nama) ? $siswa->nama : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nama') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('kelas_id', 'Kelas', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('kelas_id', $kelas, isset($siswa->kelas->id) ? $siswa->kelas->id : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('kelas') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('jurusan_id', 'Jurusan', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('jurusan_id', $jurusan, isset($siswa->jurusan->id) ? $siswa->jurusan->id : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('jurusan') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('status', 'Status', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('status', array('aktif' => 'Aktif', 'non' => 'Non-Aktif'), isset($siswa->status) ? $siswa->status : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('status') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    {{ link_to('/dashboard', 'Batal', ['class' => 'btn btn-default btn-block']) }}
                </div>
                <div class="col-xs-6">
                    {{ Form::submit(isset($siswa->id) ? 'Ubah' : 'Tambah', ['class' => 'btn btn-info btn-block']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection