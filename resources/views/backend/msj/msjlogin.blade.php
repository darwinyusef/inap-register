@if(Session::has('messaje'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('messaje')}} 
</div>
@endif

@if(Session::has('messaje-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('messaje-error')}} 
</div>
@endif

