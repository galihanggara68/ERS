@extends('layouts.dashboardL')

@section('title')
Data Kelas
@endsection

@section('content')
@if(isset($kelas))
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>{{ $kelas->nama }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">{{ Form::label('id', 'NIS :') }}</div>
                <div class="col-xs-9">{{ $kelas->id }}</div>
            </div>
            <div class="row">
                    <div class="col-xs-3">{{ Form::label('nama', 'Nama :') }}</div>
                    <div class="col-xs-9">{{ $kelas->nama }}</div>
            </div>
            <div class="row">
                    <div class="col-xs-3">{{ Form::label('siswa', 'Siswa :') }}</div>
                    @if(isset($kelas->siswa))
                        @foreach($kelas->siswa as $siswa)
                        <div class="row col-xs-12">
                            <div class="col-xs-4">{{ $siswa->nama }}</div>
                            <div class="col-xs-4">{{ $siswa->jurusan->nama }}</div>
                            <div class="col-xs-4">{{ $siswa->status }}</div>
                        </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
@else
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nama</th>
            <th class="col-xs-1">{{ link_to_route('kelas.create', '', null, ['class' => 'btn btn-default glyphicon glyphicon-plus']) }}</th>
        </thead>
        <tbody>
        @foreach($data as $kelas)
        <tr>
            <td>{{ $kelas->id }}</td>
            <td>{{ link_to_route('kelas.show', $kelas->nama, $kelas->id) }}</td>
            <td>{{ link_to_route('kelas.edit', 'Edit', $kelas->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['KelasController@destroy', $kelas->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection