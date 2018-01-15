

<?php $__env->startSection('title'); ?>
Edit Data Guru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Data <?php echo e($guru->nama); ?></h3>
    </div>
    <div class="panel-body">
        <?php if(isset($guru->id)): ?>
            <?php echo e(Form::model($guru, ['route' => ['guru.update', $guru->id]])); ?>

            <?php echo e(Form::hidden('_method', 'PUT')); ?>

        <?php else: ?>
            <?php echo e(Form::model($guru, ['route' => ['guru.store']])); ?>

        <?php endif; ?>
            <div class="form-group">
                <?php echo e(Form::label('nip', 'NIP', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::number('nip', isset($guru->nip) ? $guru->nip : null,['class' => 'form-control', 'readonly' => isset($guru->nip) ? true : false])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('nip')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('nama', 'Nama', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::text('nama', isset($guru->nama) ? $guru->nama : null, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('nama')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('wali', 'Wali Kelas', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('wali', $kelas, isset($guru->kelas->id) ? $guru->kelas->id : null, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('wali')); ?></span>
                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('kaprog', 'Kaprog', ['class' => 'col-xs-3', 'data-bind' => array_shift($kelas)])); ?>

                <div class="col-xs-9">
                    <?php echo e(Form::select('kaprog', $jurusan, isset($guru->jurusan->id) ? $guru->jurusan->id : null, ['class' => 'form-control'])); ?>

                    <span class="bg-danger text-danger"><?php echo e($errors->first('jurusan')); ?></span>
                </div>
            </div>
            <div class="form-group mapel-group">
                <?php echo e(Form::label('mapel', 'Mata Pelajaran', ['class' => 'col-xs-3'])); ?>

                <div class="col-xs-9"><span id="__addmapel" class="btn btn-default glyphicon glyphicon-plus"> Tambah Mapel</span></div>
                <?php if(count($guru->mengajar) > 0): ?>
                    <?php $__currentLoopData = $guru->mengajar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mengajar): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="row mapel-select col-xs-10 pull-right">
                        <div class="col-xs-4">
                            <?php echo e(Form::select('kelas_id[]', $kelas, isset($mengajar->id) ? $mengajar->id : null, ['class' => 'form-control'])); ?>

                            <span class="bg-danger text-danger"><?php echo e($errors->first('kelas_id')); ?></span>
                        </div>
                        <div class="col-xs-5">
                            <?php echo e(Form::select('mapel_id[]', $mapel, $guru->mapel[$loop->index]->id, ['class' => 'form-control'])); ?>

                            <span class="bg-danger text-danger"><?php echo e($errors->first('mapel_id')); ?></span>
                        </div>
                        <div class="col-xs-1"><span id="__delmapel" class="btn btn-default glyphicon glyphicon-minus"></span></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php else: ?>
                <div class="row mapel-select col-xs-10 pull-right">
                    <div class="col-xs-4">
                        <?php echo e(Form::select('kelas_id[]', $kelas,  null, ['class' => 'form-control'])); ?>

                        <span class="bg-danger text-danger"><?php echo e($errors->first('mapel')); ?></span>
                    </div>
                    <div class="col-xs-5">
                        <?php echo e(Form::select('mapel_id[]', $mapel,  null, ['class' => 'form-control'])); ?>

                        <span class="bg-danger text-danger"><?php echo e($errors->first('mapel')); ?></span>
                    </div>
                    <div class="col-xs-1"><span id="__delmapel" class="btn btn-default glyphicon glyphicon-minus"></span></div>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <?php echo e(link_to('/dashboard', 'Batal', ['class' => 'btn btn-default btn-block'])); ?>

                </div>
                <div class="col-xs-6">
                    <?php echo e(Form::submit(isset($guru->id) ? 'Ubah' : 'Tambah', ['class' => 'btn btn-info btn-block'])); ?>

                </div>
            </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardL', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>