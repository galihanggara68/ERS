<?php $__env->startSection('title'); ?>
Edit Data Siswa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Data <?php echo e($siswa->nama); ?></h3>
    </div>
    <div class="panel-body">
        <?php echo e(Form::model($siswa, ['route' => ['siswa.update', $siswa->id]])); ?>

        <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <?php echo e(Form::label('nis', 'NIS', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::number('nis', $siswa->nis,['class' => 'form-control', 'readonly' => 'true'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('nis')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('nama', 'Nama', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::text('nama', $siswa->nama, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('nama')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('kelas', 'Kelas', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('kelas', $kelas, $siswa->kelas->id, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('kelas')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('jurusan', 'Jurusan', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('jurusan', $jurusan, $siswa->jurusan->id, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('jurusan')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('status', 'Status', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('status', array('aktif' => 'Aktif', 'non' => 'Non-Aktif'), $siswa->status, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('status')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <?php echo e(link_to('/dashboard', 'Batal', ['class' => 'btn btn-default btn-block'])); ?>

                </div>
                <div class="col-xs-6">
                    <?php echo e(Form::submit('Ubah', ['class' => 'btn btn-info btn-block'])); ?>

                </div>
            </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardL', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>