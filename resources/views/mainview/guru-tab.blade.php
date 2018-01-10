@extends('layouts.dashboardL')

@section('title')
Data Guru
@endsection

@section('content')
@if(isset($guru))
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>{{ $guru->nama }}</h3>
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
                <div class="col-xs-3">{{ Form::label('kelas', 'Kelas :') }}</div>
                <div class="col-xs-9">{{ $guru->kelas->nama }}</div>
            </div>
            <div class="row">
                <div class="col-xs-3">{{ Form::label('mapel', 'Mata Pelajaran :') }}</div>
                @if(isset($guru->mapel))
                    @foreach($guru->mapel as $mapel)
                        <div class="col-xs-9">{{ $mapel->nama }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@else
    <table class="table table-striped table-hover">
        <thead>
            <th>NIP</th>
            <th>Nama</th>
        </thead>
        <tbody>
        @foreach($data as $guru)
        <tr>
            <td>{{ $guru->nip }}</td>
            <td>{{ link_to_route('guru.show', $guru->nama, $guru->id) }}</td>
            <td>{{ link_to_route('guru.edit', 'Edit', $guru->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['GuruController@destroy', $guru->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection