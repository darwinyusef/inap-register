{{-- Sweet Alert = Alertas personalizados --}}

<link rel="stylesheet" href="{{url('assets/css/sweetalert.css')}}">
<script src="{{url('assets/js/sweetalert.min.js')}}"></script>


@include('backend.msj/sw-alert')
@include('backend.msj/msjlogin')


{{-- Formularios data personalizados  --}}
<link rel="stylesheet" href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}">
<script type="text/javascript" src="{{url('assets/js/moment-with-locales.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap-datetimepicker.min.js')}}"></script>



<script type="text/javascript">
  $('.datepicker').datetimepicker({
      locale: 'es',
      format: 'DD/MM/YYYY'
 });
</script>
