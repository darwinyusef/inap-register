@extends('backend.layout.app')

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('import') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                <label for="file" class="col-md-12">Cargar Archivo CSV con formato aprobado</label>
                <div class="col-md-12">
                    <input type="file" name="file" class="form-control" name="file" accept=".xls,.xlsx" required>
                    @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Cargar CSV
                    </button>
                </div>
            </div>
        </div>

    </form> 

    @include('../backend/partials/form-includes')
@endsection

@section('title') INAP | Listado de archivos creado @endsection
@section('pageTitle')
    <h1>Subir CSV para Inscripción de usuarios <small> Listado de Archivos CSV</small> </h1>
@endsection

{{-- @section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
    <li class="active">Archivos</li>
  </ol>
@endsection --}}


@section('scripts')
    <script>
        $('#expiration').focusout(function() {
            $('#mod_in').val($(this).val());
        });
    </script>
@endsection
