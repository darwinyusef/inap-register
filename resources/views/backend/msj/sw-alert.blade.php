@if(Session::has('sw-mensaje'))
 <script>
$(document).ready(function() {
 setTimeout(function(){ swal("Success!", "{{Session::get('sw-mensaje')}}", "success");  }, 500);
});
</script>
@endif


@if(Session::has('sw-mensaje-error'))
 <script>
$(document).ready(function() {
 setTimeout(function(){ swal("Success!", "{{Session::get('sw-mensaje-error')}}", "error");  }, 500);
});
</script>
@endif
