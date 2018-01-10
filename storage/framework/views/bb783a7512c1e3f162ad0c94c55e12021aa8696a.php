<?php $__env->startSection('title'); ?>
Data Jurusan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nama</th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jurusan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($jurusan->id); ?></td>
            <td><?php echo e($jurusan->nama); ?></td>
            <td><?php echo e(link_to_route('jurusan.edit', 'Edit', $jurusan->id, ['class' => 'btn btn-default'])); ?></td>
            <td>
                <?php echo e(Form::open(['action' => ['JurusanController@destroy', $jurusan->id], 'method' => 'DELETE'])); ?>

                    <?php echo e(Form::submit('Hapus', ['class' => 'btn btn-danger'])); ?>

                <?php echo e(Form::close()); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardL', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>