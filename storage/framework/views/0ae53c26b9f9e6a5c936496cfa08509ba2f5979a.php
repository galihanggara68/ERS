

<?php $__env->startSection('title'); ?>
Data Siswa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($siswa)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3><?php echo e($siswa->nama); ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('nis', 'NIS :')); ?></div>
                <div class="col-xs-9"><?php echo e($siswa->nis); ?></div>
            </div>
            <div class="row">
                    <div class="col-xs-3"><?php echo e(Form::label('nama', 'Nama :')); ?></div>
                    <div class="col-xs-9"><?php echo e($siswa->nama); ?></div>
            </div>
            <div class="row">
                    <div class="col-xs-3"><?php echo e(Form::label('kelas', 'Kelas :')); ?></div>
                    <div class="col-xs-9"><?php echo e($siswa->kelas->nama); ?></div>
            </div>
            <div class="row">
                    <div class="col-xs-3"><?php echo e(Form::label('jurusan', 'Jurusan :')); ?></div>
                    <div class="col-xs-9"><?php echo e($siswa->jurusan->nama); ?></div>
            </div>
        </div>
    </div>
<?php else: ?>
    <table class="table table-striped table-hover table-condensed table-fixed">
        <thead>
            <tr>
                <th class="col-xs-2">NIS</th>
                <th class="col-xs-3">Nama</th>
                <th class="col-xs-2">Kelas</th>
                <th class="col-xs-3">Jurusan</th>
                <th class="col-xs-1">Status</th>
                <th class="col-xs-1"><?php echo e(link_to_route('siswa.create', '', null, ['class' => 'btn btn-default glyphicon glyphicon-plus'])); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td class="col-xs-2"><?php echo e($siswa->nis); ?></td>
            <td class="col-xs-3"><?php echo e(link_to_route('siswa.show', $siswa->nama, $siswa->id)); ?></td>
            <td class="col-xs-2"><?php echo e($siswa->kelas->nama); ?></td>
            <td class="col-xs-3"><?php echo e($siswa->jurusan->nama); ?></td>
            <td class="col-xs-2"><?php echo e(ucwords($siswa->status)); ?></td>
            <td><?php echo e(link_to_route('siswa.edit', 'Edit', $siswa->id, ['class' => 'btn btn-default'])); ?></td>
            <td>
                <?php echo e(Form::open(['action' => ['SiswaController@destroy', $siswa->id], 'method' => 'DELETE'])); ?>

                    <?php echo e(Form::submit('Hapus', ['class' => 'btn btn-danger'])); ?>

                <?php echo e(Form::close()); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardL', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>