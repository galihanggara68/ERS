<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <div class="container-fluid">
        <div id="sideNav" class="sidenav col-xs-3">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <?php echo e(link_to('/dashboard', 'Siswa')); ?>

            <?php echo e(link_to('/dashboard/kelas', 'Kelas')); ?>

            <?php echo e(link_to('/dashboard/guru', 'Guru')); ?>

            <?php echo e(link_to('/dashboard/jurusan', 'Jurusan')); ?>

            <?php echo e(link_to('/dashboard/mapel', 'Mapel')); ?>

            <?php echo e(link_to('/dashboard/nilai', 'Nilai')); ?>

            <?php echo e(link_to('/dashboard/user', 'User')); ?>

            <?php echo e(Form::open(['url' => 'logout', 'method' => 'POST'])); ?>

                <?php echo e(Form::submit('Logout', ['class' => 'well col-xs-12'])); ?>

            <?php echo e(Form::close()); ?>

        </div>
        <span onclick="openNav()" class="opennav"><i class="glyphicon glyphicon-menu-hamburger btn btn-default"></i></span>
        <div class="content col-xs-10 pull-right">
            <?php echo $__env->yieldContent('content'); ?>
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissable fade" role="alert">
                        <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                        <strong><?php echo e(session('success')); ?></strong>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($data) && $data->links() != null): ?>
                    <div class="center-block"><?php echo e($data->links()); ?></div>
                <?php endif; ?>
        </div>
    </div>
</body>
<script src="/js/app.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/dashboard.js"></script>
</html>