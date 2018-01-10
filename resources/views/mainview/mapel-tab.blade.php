@extends('layouts.dashboardL')

@section('title')
Data Jurusan
@endsection

@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nama</th>
        </thead>
        <tbody>
        @foreach($data as $mapel)
        <tr>
            <td>{{ $mapel->id }}</td>
            <td>{{ $mapel->nama }}</td>
            <td>{{ link_to_route('mapel.edit', 'Edit', $mapel->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['MapelController@destroy', $mapel->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection