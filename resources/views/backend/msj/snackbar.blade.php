
<script src="{{ url('assets/js/snackbar.min.js') }}"></script>
<style>
.snackbar {
  display: block;
  position: fixed;
  top: 30px;
  right: 10px;
  z-index: 99999;
  padding:15px;
  color:white;
  border-radius:10px;
}
</style>

@if(Session::has('snackbar-success'))
  <span class="hidden" data-toggle="snackbar" data-timeout="6000" data-content="{{Session::get('snackbar-success')}}"></span>
  <style>
  .snackbar {
    background-color: #4caf50 !important;
  }
  </style>
 <script>
 $(document).ready(function() {
   setTimeout(function(){ $('[data-toggle="snackbar"]').snackbar("show"); }, 500);
 });
</script>
@endif


@if(Session::has('snackbar-danger'))
  <span class="hidden" data-toggle="snackbar" data-timeout="6000" data-content="{{Session::get('snackbar-danger')}}"></span>
  <style>
  .snackbar {
    background-color: red !important;
  }
  </style>
 <script>
 $(document).ready(function() {
   setTimeout(function(){ $('[data-toggle="snackbar"]').snackbar("show"); }, 500);
 });
</script>
@endif

@if(Session::has('snackbar-info'))
  <span class="hidden" data-toggle="snackbar" data-timeout="6000" data-content="{{Session::get('snackbar-info')}}"></span>
  <style>
  .snackbar {
    background-color: #03a9f4 !important;
  }
  </style>
 <script>
 $(document).ready(function() {
   setTimeout(function(){ $('[data-toggle="snackbar"]').snackbar("show"); }, 500);
 });
</script>
@endif

@if(Session::has('snackbar-warning'))
  <span class="hidden" data-toggle="snackbar" data-timeout="6000" data-content="{{Session::get('snackbar-warning')}}"></span>
  <style>
  .snackbar {
    background-color: #ff5722 !important;
  }
  </style>
 <script>
 $(document).ready(function() {
   setTimeout(function(){ $('[data-toggle="snackbar"]').snackbar("show"); }, 500);
 });
</script>
@endif
