<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="app">
<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ asset('css/jplayer.flat.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}" type="text/css" />

  <!--[if lt IE 9]>
    <script src="{{ asset('js/ie/html5shiv.js')}}"></script>
    <script src="{{ asset('js/ie/respond.min.js')}}"></script>
    <script src="{{ asset('js/ie/excanvas.js')}}"></script>
  <![endif]-->
  <script src="{{ asset('js/app.laravel.js')}}"></script>
</head>
<body class="">
  <section class="vbox">
    @include('includes.header')
    <section>
      <section class="hbox stretch">
        <!-- .sidebave -->
        @include('includes.sidenav')
        <!-- /.sidenav -->
        <section id="content">
          <section class="vbox">
          <section class="w-f-md">
              <section class="hbox stretch bg-black dker">
                    @yield('content')
              </section>
          </section>
          @include('includes.footer-player')
        </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('js/bootstrap.js')}}"></script>
  <!-- App -->
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{ asset('js/parsley/parsley.min.js')}}"></script>
  <script src="{{ asset('js/parsley/parsley.extend.js')}}"></script>
  <script src="{{ asset('js/app.plugin.js')}}"></script>
  <script src="{{ asset('js/slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{ asset('js/app.plugin.js')}}"></script>
  <script src="{{ asset('js/jPlayer/jquery.jplayer.min.js')}}"></script>
  <script src="{{ asset('js/jPlayer/add-on/jplayer.playlist.min.js')}}"></script>
  <script src="{{ asset('js/jPlayer/demo.js')}}"></script>
 @stack('scripts')

</body>
</html>
