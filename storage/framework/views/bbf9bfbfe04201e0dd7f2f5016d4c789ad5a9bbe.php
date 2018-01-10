<?php $__env->startSection('title'); ?>
Data Kelas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nama</th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($kelas->id); ?></td>
            <td><?php echo e($kelas->nama); ?></td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardL', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>