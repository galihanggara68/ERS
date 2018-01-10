@extends('layouts.dashboardL')

@section('title')
Data Kelas
@endsection

@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nama</th>
        </thead>
        <tbody>
        @foreach($data as $kelas)
        <tr>
            <td>{{ $kelas->id }}</td>
            <td>{{ $kelas->nama }}</td>
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
@endsection