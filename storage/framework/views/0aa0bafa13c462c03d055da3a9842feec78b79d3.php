

<?php $__env->startSection('title'); ?>
Data Kelas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($kelas)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3><?php echo e($kelas->nama); ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('id', 'NIS :')); ?></div>
                <div class="col-xs-9"><?php echo e($kelas->id); ?></div>
            </div>
            <div class="row">
                    <div class="col-xs-3"><?php echo e(Form::label('nama', 'Nama :')); ?></div>
                    <div class="col-xs-9"><?php echo e($kelas->nama); ?></div>
            </div>
            <div class="row">
                    <div class="col-xs-3"><?php echo e(Form::label('siswa', 'Siswa :')); ?></div>
                    <?php if(isset($kelas->siswa)): ?>
                        <?php $__currentLoopData = $kelas->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="row col-xs-12">
                            <div class="col-xs-4"><?php echo e($siswa->nama); ?></div>
                            <div class="col-xs-4"><?php echo e($siswa->jurusan->nama); ?></div>
                            <div class="col-xs-4"><?php echo e($siswa->status); ?></div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nama</th>
            <th class="col-xs-1"><?php echo e(link_to_route('kelas.create', '', null, ['class' => 'btn btn-default glyphicon glyphicon-plus'])); ?></th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($kelas->id); ?></td>
            <td><?php echo e(link_to_route('kelas.show', $kelas->nama, $kelas->id)); ?></td>
            <td><?php echo e(link_to_route('kelas.edit', 'Edit', $kelas->id, ['class' => 'btn btn-default'])); ?></td>
            <td>
                <?php echo e(Form::open(['action' => ['KelasController@destroy', $kelas->id], 'method' => 'DELETE'])); ?>

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