@extends('layouts.dashboardL')

@section('title')
Data Siswa
@endsection

@section('content')
@if(isset($siswa))
    <div class="panel panel-info">
        <div class="panel-heading">
            {{ link_to(URL::previous(), '', ['class' => 'btn btn-default glyphicon glyphicon-chevron-left']) }}
            <h3>{{ $siswa->nama }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">{{ Form::label('nis', 'NIS :') }}</div>
                <div class="col-xs-9">{{ $siswa->nis }}</div>
            </div>
            <div class="row">
                    <div class="col-xs-3">{{ Form::label('nama', 'Nama :') }}</div>
                    <div class="col-xs-9">{{ $siswa->nama }}</div>
            </div>
            <div class="row">
                    <div class="col-xs-3">{{ Form::label('kelas', 'Kelas :') }}</div>
                    <div class="col-xs-9">{{ $siswa->kelas->nama }}</div>
            </div>
            <div class="row">
                    <div class="col-xs-3">{{ Form::label('jurusan', 'Jurusan :') }}</div>
                    <div class="col-xs-9">{{ $siswa->jurusan->nama }}</div>
            </div>
        </div>
    </div>
@elseif(isset($data))
    @include('ajax.list_siswa')
@else
    <div id="form-pilih">
        <div class="col-md-5">
            {{ Form::select('mapel_id',['def' => '-Pilih Mapel-'] + $list, 'def', ['class' => 'form-control', 'id' => 'mapel_id']) }}
        </div>
    </div>
    <div id="content-siswa"></div>
@endif
@endsection