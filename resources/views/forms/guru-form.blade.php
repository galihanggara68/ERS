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
        @if(isset($guru->id))
            {{ Form::model($guru, ['route' => ['guru.update', $guru->id]]) }}
            {{ Form::hidden('_method', 'PUT') }}
        @else
            {{ Form::model($guru, ['route' => ['guru.store']]) }}
        @endif
            <div class="form-group">
                {{ Form::label('nip', 'NIP', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::number('nip', isset($guru->nip) ? $guru->nip : null,['class' => 'form-control', 'readonly' => isset($guru->nip) ? true : false]) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nip') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('nama', 'Nama', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::text('nama', isset($guru->nama) ? $guru->nama : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('nama') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('wali', 'Wali Kelas', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9">
                    {{ Form::select('wali', $kelas, isset($guru->kelas->id) ? $guru->kelas->id : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('wali') }}</span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('kaprog', 'Kaprog', ['class' => 'col-xs-3', 'data-bind' => array_shift($kelas)]) }}
                <div class="col-xs-9">
                    {{ Form::select('kaprog', $jurusan, isset($guru->jurusan->id) ? $guru->jurusan->id : null, ['class' => 'form-control']) }}
                    <span class="bg-danger text-danger">{{ $errors->first('jurusan') }}</span>
                </div>
            </div>
            <div class="form-group mapel-group">
                {{ Form::label('mapel', 'Mata Pelajaran', ['class' => 'col-xs-3']) }}
                <div class="col-xs-9"><span id="__addmapel" class="btn btn-default glyphicon glyphicon-plus"> Tambah Mapel</span></div>
                @if(count($guru->mengajar) > 0)
                    @foreach($guru->mengajar as $mengajar)
                    <div class="row mapel-select col-xs-10 pull-right">
                        <div class="col-xs-4">
                            {{ Form::select('kelas_id[]', $kelas, isset($mengajar->id) ? $mengajar->id : null, ['class' => 'form-control']) }}
                            <span class="bg-danger text-danger">{{ $errors->first('kelas_id') }}</span>
                        </div>
                        <div class="col-xs-5">
                            {{ Form::select('mapel_id[]', $mapel, $guru->mapel[$loop->index]->id, ['class' => 'form-control']) }}
                            <span class="bg-danger text-danger">{{ $errors->first('mapel_id') }}</span>
                        </div>
                        <div class="col-xs-1"><span id="__delmapel" class="btn btn-default glyphicon glyphicon-minus"></span></div>
                    </div>
                    @endforeach
                @else
                <div class="row mapel-select col-xs-10 pull-right">
                    <div class="col-xs-4">
                        {{ Form::select('kelas_id[]', $kelas,  null, ['class' => 'form-control']) }}
                        <span class="bg-danger text-danger">{{ $errors->first('mapel') }}</span>
                    </div>
                    <div class="col-xs-5">
                        {{ Form::select('mapel_id[]', $mapel,  null, ['class' => 'form-control']) }}
                        <span class="bg-danger text-danger">{{ $errors->first('mapel') }}</span>
                    </div>
                    <div class="col-xs-1"><span id="__delmapel" class="btn btn-default glyphicon glyphicon-minus"></span></div>
                </div>
                @endif
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    {{ link_to('/dashboard', 'Batal', ['class' => 'btn btn-default btn-block']) }}
                </div>
                <div class="col-xs-6">
                    {{ Form::submit(isset($guru->id) ? 'Ubah' : 'Tambah', ['class' => 'btn btn-info btn-block']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection