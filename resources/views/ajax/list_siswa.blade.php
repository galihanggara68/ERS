@if(isset($data))
<table class="table table-striped table-hover table-condensed table-fixed">
    <thead>
        <tr>
            <th class="col-xs-2">NIS</th>
            <th class="col-xs-3">Nama</th>
            <th class="col-xs-2">Kelas</th>
            <th class="col-xs-3">Jurusan</th>
            <th class="col-xs-1">Status</th>
            <th class="col-xs-1">{{ link_to_route('siswa.create', '', null, ['class' => 'btn btn-default glyphicon glyphicon-plus']) }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $siswa)
    <tr>
        <td class="col-xs-2">{{ $siswa->nis }}</td>
        <td class="col-xs-3">{{ link_to_route('siswa.show', $siswa->nama, $siswa->id) }}</td>
        <td class="col-xs-2">{{ $siswa->kelas->nama }}</td>
        <td class="col-xs-3">{{ $siswa->jurusan->nama }}</td>
        <td class="col-xs-2">{{ ucwords($siswa->status) }}</td>
        <td>{{ link_to_route('siswa.edit', 'Edit', $siswa->id, ['class' => 'btn btn-default']) }}</td>
        <td>
            {{ Form::open(['action' => ['SiswaController@destroy', $siswa->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Hapus', ['class' => 'btn btn-danger', 'id' => 'delete']) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
    <div class="bg-info">Data Siswa Tidak Ada</div>
@endif