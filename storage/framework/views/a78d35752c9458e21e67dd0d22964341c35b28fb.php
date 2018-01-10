<?php $__env->startSection('title'); ?>
Data Guru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($guru)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3><?php echo e($guru->nama); ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('nip', 'NIP :')); ?></div>
                <div class="col-xs-9"><?php echo e($guru->nip); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('nama', 'Nama :')); ?></div>
                <div class="col-xs-9"><?php echo e($guru->nama); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('kelas', 'Kelas :')); ?></div>
                <div class="col-xs-9"><?php echo e($guru->kelas->nama); ?></div>
            </div>
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('mapel', 'Mata Pelajaran :')); ?></div>
                <?php if(isset($guru->mapel)): ?>
                    <?php $__currentLoopData = $guru->mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mapel): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="col-xs-9"><?php echo e($mapel->nama); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <table class="table table-striped table-hover">
        <thead>
            <th>NIP</th>
            <th>Nama</th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($guru->nip); ?></td>
            <td><?php echo e(link_to_route('guru.show', $guru->nama, $guru->id)); ?></td>
            <td><?php echo e(link_to_route('guru.edit', 'Edit', $guru->id, ['class' => 'btn btn-default'])); ?></td>
            <td>
                <?php echo e(Form::open(['action' => ['GuruController@destroy', $guru->id], 'method' => 'DELETE'])); ?>

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