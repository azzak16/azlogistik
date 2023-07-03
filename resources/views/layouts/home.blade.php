<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body>

    <div class="navbar">

        <ul>
            <li><a class="active" href="{{ route('golongan.index') }}">Golongan</a></li>
            <li><a href="{{ route('karyawan.index') }}">Karyawan</a></li>
            <li><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
        </ul>

    </div>

    <div class="content">

        @yield('content')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('scripts')
</body>
</html>
