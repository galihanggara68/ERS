@extends('layouts.dashboardL')

@section('title')
Data Nilai
@endsection

@section('content')
    <table class="table table-striped table-hover table-fixed">
        <thead>
            <tr>
                <div class="col-xs-4">
                    <th class="col-xs-2 col-1_5">ID</th>
                    <th class="col-xs-2">Guru</th>
                </div>
                <th class="col-xs-2">Mapel</th>
                <th class="col-xs-2 col-1_5">Siswa</th>
                <th class="col-xs-2 col-1_5">Pengetahuan</th>
                <th class="col-xs-2 col-1_5">Keterampilan</th>
                <th class="col-xs-2">Sikap, Sopan Santun, Spiritual</th>
                <th class="col-xs-1">{{ link_to_route('nilai.create', '', null, ['class' => 'btn btn-default glyphicon glyphicon-plus']) }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $nilai)
        <tr>
            <td class="col-xs-2">{{ $nilai->id }}</td>
            <td class="col-xs-2">{{ $nilai->guru->nama }}</td>
            <td class="col-xs-2">{{ $nilai->mapel->nama }}</td>
            <td class="col-xs-2">{{ $nilai->siswa->nama }}</td>
            <td class="col-xs-2">{{ $nilai->pengetahuan }}</td>
            <td class="col-xs-2">{{ $nilai->keterampilan }}</td>
            <td class="col-xs-2">{{ $nilai->sisosp }}</td>
            <td>{{ link_to_route('nilai.edit', 'Edit', $nilai->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['NilaiController@destroy', $nilai->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection