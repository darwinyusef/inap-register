@extends('backend.layout.app')
{{-- 'attachment','page','post','revision','portfolio','directory','publicity' --}}

@section('css')
    @include('backend.partials.ckeditor_css')
@endsection

@section('content')

    <form class="form-horizontal" method="POST" action="{{ route('ticket.store') }}">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Este espacio se encuentra generado para que usted pueda crear una solicitud de PQR
                        o reporte algun problema, agradecemos sea especifico</h4>
                </div>

                <div class="form-group{{ $errors->has('problem') ? ' has-error' : '' }}">
                    <label for="problem" class="col-md-12">Nombre el problema</label>

                    <div class="col-md-12">
                        <input id="problem" type="text" class="form-control" name="problem" value="{{ old('problem') }}"
                            required autofocus>

                        @if ($errors->has('problem'))
                            <span class="help-block">
                                <strong>{{ $errors->first('problem') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-12">Email</label>

                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                            required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-12">Descrpición</label>

                    <div class="col-md-12">
                        <textarea class="form-control" rows="15" id="editor" name="description" required
                            autofocus>{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>

    </form>

@endsection


@section('title') INAP | Crear Ticket @endsection
@section('pageTitle')
    <h3> Crear Ticket </h3>
@endsection

{{-- @section('breadcrumb')
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/backend"> Home</a></li>
    <li class="breadcrumb-item"><a href="/backend/taxonomias"> Ticket</a></li>
    <li class="breadcrumb-item active"> Crear </li>
  </ol>
@endsection --}}



@section('scripts')
    @include('backend.partials.ckeditor')
@endsection
