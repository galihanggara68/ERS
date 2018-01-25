<div class="col-md-5" id="dropdown-kelas">
{{ Form::select('kelas_id', ['def' => '-Pilih Kelas-'] + $kelas, 'def', ['class' => 'form-control', 'id' => 'kelas_id']) }}
</div>