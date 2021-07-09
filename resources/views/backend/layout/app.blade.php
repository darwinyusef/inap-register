<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-blue.min.css') }}">
  <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ url('assets/css/snackbar.min.css') }}" />
   @yield('css')
</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse" style="overflow-y:scroll">

  
    @include('backend.layout.leftMenu')

    @include('backend.layout.header')
  <div class="wrapper">
      <div class="content-wrapper">
        <section class="content-header">
            @yield('header')
            @yield('breadcrumb')
        </section>
        <section class="content container-fluid">
          @yield('pageTitle')
          @yield('content')
        </section>
    </div>

    @include('backend.layout/footer')
  </div>


<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>

<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/select2-bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>

{{-- Snack Bar = Contenido para mensajes adicionales --}}
<script src="{{url('assets/js/snackbar.min.js')}}"></script>
{{--@include('/msj/snackbar') --}}


<script src="{{ asset('assets/js/app.js') }}"></script>
{{-- Select 2 = Select con propiedades  --}}
@yield('scripts')

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();

    $('a[data-toggle="push-menu"]').click(function(){
      if( $('#log').is(':visible') ){
        $('#log').hide();
      }else{
        $('#log').show();
      }
    });
  })
</script>


@include('backend.msj.snackbar')
</body>
</html>
