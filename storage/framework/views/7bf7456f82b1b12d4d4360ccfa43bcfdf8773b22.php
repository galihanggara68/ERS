<?php $__env->startSection('title'); ?>
Data Nilai
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-striped table-hover table-fixed">
        <thead>
            <tr>
                <th class="col-xs-2 col-1_5">ID</th>
                <th class="col-xs-2">Guru</th>
                <th class="col-xs-2">Mapel</th>
                <th class="col-xs-2 col-1_5">Siswa</th>
                <th class="col-xs-2 col-1_5">Pengetahuan</th>
                <th class="col-xs-2 col-1_5">Keterampilan</th>
                <th class="col-xs-2">Sikap, Sopan Santun, Spiritual</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nilai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td class="col-xs-2"><?php echo e($nilai->id); ?></td>
            <td class="col-xs-2"><?php echo e($nilai->guru->nama); ?></td>
            <td class="col-xs-2"><?php echo e($nilai->mapel->nama); ?></td>
            <td class="col-xs-2"><?php echo e($nilai->siswa->nama); ?></td>
            <td class="col-xs-2"><?php echo e($nilai->pengetahuan); ?></td>
            <td class="col-xs-2"><?php echo e($nilai->keterampilan); ?></td>
            <td class="col-xs-2"><?php echo e($nilai->sisosp); ?></td>
            <td><?php echo e(link_to_route('nilai.edit', 'Edit', $nilai->id, ['class' => 'btn btn-default'])); ?></td>
            <td>
                <?php echo e(Form::open(['action' => ['NilaiController@destroy', $nilai->id], 'method' => 'DELETE'])); ?>

                    <?php echo e(Form::submit('Hapus', ['class' => 'btn btn-danger'])); ?>

                <?php echo e(Form::close()); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardL', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>