<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi Akademik</title>
</head>
<body>
    <div class="container">
        <div class="content">
        @yield('content')
        {{--  Success Alert  --}}
        @if(session('notice'))
            <div class="alert alert-success alert-dismissable fade" role="alert">
                <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissable fade" role="alert">
                <button class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        </div>
    </div>
</body>
<script src="/js/app.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/dashboard.js"></script>
</html>