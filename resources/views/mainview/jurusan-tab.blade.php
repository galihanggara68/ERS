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
        @foreach($data as $jurusan)
        <tr>
            <td>{{ $jurusan->id }}</td>
            <td>{{ $jurusan->nama }}</td>
            <td>{{ link_to_route('jurusan.edit', 'Edit', $jurusan->id, ['class' => 'btn btn-default']) }}</td>
            <td>
                {{ Form::open(['action' => ['JurusanController@destroy', $jurusan->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Hapus', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection