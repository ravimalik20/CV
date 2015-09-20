<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
    <link href="{{URL::to('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL::to('/assets/css/main.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="{{URL::to('/assets/js/html5shiv.js')}}"></script>
      <script src="{{URL::to('/assets/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

    @yield("main_content")

    </div>
    <!-- JQUERY -->
    <script src="{{URL::to('/assets/js/jquery.min.js')}}"></script>
    <!-- BOOTSTRAP -->
    <script src="{{URL::to('/assets/js/bootstrap.min.js')}}"></script>
    <!-- SCRIPTS -->
    <script src="{{URL::to('/assets/js/scripts.js')}}"></script>

    @yield("extra_scripts")

  </body>
</html>
