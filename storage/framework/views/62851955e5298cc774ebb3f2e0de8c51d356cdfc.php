<?php $__env->startSection('title'); ?>
Data User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissable fade" role="alert">
        <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo e(session('success')); ?></strong>
    </div>
<?php endif; ?>
<?php if(isset($user)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3><?php echo e($user->name); ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3"><?php echo e(Form::label('nis', 'NIS :')); ?></div>
                <div class="col-xs-9"><?php echo e($user->name); ?></div>
            </div>
            <div class="row">
                    <div class="col-xs-3"><?php echo e(Form::label('nama', 'Nama :')); ?></div>
                    <div class="col-xs-9"><?php echo e($user->email); ?></div>
            </div>
        </div>
    </div>
<?php else: ?>
    <table class="table table-striped table-hover table-condensed table-fixed">
        <thead>
            <tr>
                <th class="col-xs-2">Name</th>
                <th class="col-xs-3">Email</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td class="col-xs-2"><?php echo e($user->name); ?></td>
            <td class="col-xs-3"><?php echo e(link_to_route('user.show', $user->email, $user->id)); ?></td>
            <td><?php echo e(link_to_route('user.edit', 'Edit', $user->id, ['class' => 'btn btn-default'])); ?></td>
            <td>
                <?php echo e(Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'DELETE'])); ?>

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