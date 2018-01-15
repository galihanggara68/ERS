@extends('layouts.dashboardL')

@section('title')
Data Guru
@endsection

@section('content')
@if(isset($guru))
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>{{ $guru->nama }}</h3>
            <span>{{ link_to_route('guru.edit', 'Edit', $guru->id, ['class' => 'btn btn-default']) }}</span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">{{ Form::label('nip', 'NIP :') }}</div>
                <div class="col-xs-9">{{ $guru->nip }}</div>
            </div>
            <div class="row">
                <div class="col-xs-3">{{ Form::label('nama', 'Nama :') }}</div>
                <div class="col-xs-9">{{ $guru->nama }}</div>
            </div>
            <div class="row">
                <div class="col-xs-3">{{ Form::label('kelas', 'Wali Kelas :') }}</div>
                <div class="col-xs-9">{{ isset($guru->kelas->nama) ? $guru->kelas->nama : '-' }}</div>
            </div>
            <div class="row">
                <div class="col-xs-3">{{ Form::label('jurusan', 'Kaprog :') }}</div>
                <div class="col-xs-9">{{ isset($guru->jurusan->nama) ? $guru->jurusan->nama : '-' }}</div>
            </div>
            <div class="row">
                <div class="col-xs-3">{{ Form::label('mapel', 'Mengajar :') }}</div>
                @if(isset($guru->mapel))
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                    </thead>
                    <tbody>
                        @foreach($guru->mengajar as $mengajar)
                            <tr>
                                <td>{{ link_to_route('kelas.show', $mengajar->nama, $mengajar->id) }}</td>
                                <td>{{ $guru->mapel[$loop->index]->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@else
    <table class="table table-striped table-hover">
        <thead>
            <th>NIP</th>
            <th>Nama</th>
            <th class="col-xs-1">{{ link_to_route('guru.create', '', null, ['class' => 'btn btn-default glyphicon glyphicon-plus']) }}</th>
        </thead>
        <tbody>
        @foreach($data as $guru)
        <tr>
            <td>{{ $guru->nip }}</td>
            <td>{{ link_to_route('guru.show', $guru->nama, $guru->id) }}</td>
            <td>{{ link_to_route('guru.edit', 'Edit', $guru->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['GuruController@destroy', $guru->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger', 'id' => 'delete']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection