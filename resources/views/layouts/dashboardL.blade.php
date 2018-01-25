<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fluid">
        <div id="sideNav" class="sidenav col-xs-3">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            {{ link_to('/dashboard', 'Siswa') }}
            {{ link_to('/dashboard/kelas', 'Kelas') }}
            @if(Sentinel::inRole('admin')){{ link_to('/dashboard/guru', 'Guru') }}@endif
            {{ link_to('/dashboard/jurusan', 'Jurusan') }}
            @if(Sentinel::inRole('admin')){{ link_to('/dashboard/mapel', 'Mapel') }}@endif
            @if(Sentinel::inRole('admin')){{ link_to('/dashboard/user', 'User') }}@endif
            {{ link_to_route('logout', 'Logout', null, ['class' => 'btn btn-lg btn-danger btn-outline-default', 'id' => 'logout']) }}
            <div class="col-md-12" align="center">
                Login as <b><span class="text-info">{{ Sentinel::getUser()->email }}</span></b>
            </div>
        </div>
        <span onclick="openNav()" class="opennav"><i class="glyphicon glyphicon-menu-hamburger btn btn-default"></i></span>
        <div class="content col-xs-10 pull-right">
            @yield('content')
                {{--  Success Alert  --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissable fade" role="alert">
                        <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissable fade" role="alert">
                        <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @elseif(session('notice'))
                    <div class="alert alert-info alert-dismissable fade" role="alert">
                        <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('notice') }}</strong>
                    </div>
                @endif
                {{--  Pagination Nav  --}}
                @if(isset($data) && $data->links() != null)
                    <div class="center-block">{{ $data->links() }}</div>
                @endif
        </div>
    </div>
</body>
<script src="/js/app.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/dashboard.js"></script>
</html>