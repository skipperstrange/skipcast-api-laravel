<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SkipCast') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/jPlayer/jplayer.flat.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" type="text/css" />
    <!--[if lt IE 9]>
    <script src="{{ asset('js/ie/html5shiv.js')}}"></script>
    <script src="{{ asset('js/ie/respond.min.js')}}"></script>
    <script src="{{ asset('js/ie/excanvas.js')}}"></script>
  <![endif]-->
</head>
<body  class="bg-info dker" style="height:100%;">


            @yield('content')

 <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>skipcast <br>&copy; 2016</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.js')}}"></script>
  <!-- App -->
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{ asset('js/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('js/app.plugin.js')}}"></script>
  <script src="{{ asset('js/jPlayer/jquery.jplayer.min.js')}}"></script>
  <script src="{{ asset('js/jPlayer/add-on/jplayer.playlist.min.js')}}"></script>
  <script src="{{ asset('js/jPlayer/demo.js')}}"></script>
</body>
</html>
