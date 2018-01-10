<?php $__env->startSection('title'); ?>
Edit Data Guru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Data <?php echo e($guru->nama); ?></h3>
    </div>
    <div class="panel-body">
        <?php echo e(Form::model($guru, ['route' => ['guru.update', $guru->id]])); ?>

        <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <?php echo e(Form::label('nip', 'NIP', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::number('nip', $guru->nip,['class' => 'form-control', 'readonly' => 'true'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('nip')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('nama', 'Nama', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::text('nama', $guru->nama, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('nama')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('wali', 'Wali Kelas', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('wali', $kelas, $guru->kelas->id, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('wali')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('kaprog', 'Kaprog', ['class' => 'col-xs-3', 'data-bind' => array_shift($kelas)])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('kaprog', $jurusan, $guru->jurusan->id, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('jurusan')); ?></span>
                </div>
            </div>
            <div class="form-group mapel-group">
                <?php echo e(Form::label('mapel', 'Mata Pelajaran', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9"><span id="__addmapel" class="btn btn-default glyphicon glyphicon-plus"> Tambah Mapel</span></div>
                <div class="row mapel-select col-xs-10 pull-right">
                    <div class="col-xs-4">
                        <?php echo e(Form::select('kelas[]', $kelas, isset($guru->kelas->id) ? $guru->kelas->id : null, ['class' => 'form-control'])); ?>

                        <span class="bg-danger text-danger"><?php echo e($errors->first('mapel')); ?></span>
                    </div>
                    <div class="col-xs-5">
                        <?php echo e(Form::select('mapel[]', $mapel, isset($guru->mapel->id) ? $guru->mapel->id : null, ['class' => 'form-control'])); ?>

                        <span class="bg-danger text-danger"><?php echo e($errors->first('mapel')); ?></span>
                    </div>
                    <div class="col-xs-1"><span id="__delmapel" class="btn btn-default glyphicon glyphicon-minus"></span></div>
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