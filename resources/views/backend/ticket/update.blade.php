@extends('backend.layout.app')

@section('css')
    @include('backend.partials.ckeditor_css')
@endsection

@section('content')

    <form class="form-horizontal" method="POST" action="{{ route('ticket.update', $ticket->id) }}">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="card" style="padding:15px">
                <div class="card-body">
                    <h3 class="box-title">Actualizar Tickets</h3>
                </div>

                <div class="form-group{{ $errors->has('problem') ? ' has-error' : '' }}">
                    <label for="problem" class="col-md-12">Nombre el problema</label>

                    <div class="col-md-12">
                        <input id="problem" type="text" class="form-control" name="problem" value="{{ $ticket->problem }}"
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
                        <input id="email" type="text" class="form-control" name="email" value="{{ $ticket->email }}"
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
                            autofocus>{{ $ticket->description }}"</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                @if (in_array('admin:ticket-resolve', $permission))
                    <div class="form-group{{ $errors->has('resolve') ? ' has-error' : '' }}">
                        <label for="resolve" class="col-md-12">Respuesta del problema</label>

                        <div class="col-md-12">
                            <textarea class="form-control" rows="15" id="editor" name="resolve" required
                                autofocus>{{ $ticket->resolve }}</textarea>

                            @if ($errors->has('resolve'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('resolve') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>

    </form>

@endsection


@section('title') Inap Ayudas Pedagogicas | Actualizar Tickets @endsection
@section('pageTitle')
    <h3> Actualizar Tickets </h3>
@endsection

{{-- @section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/backend"> Home</a></li>
    <li class="breadcrumb-item"><a href="/backend/taxonomias"> Tickets</a></li>
    <li class="breadcrumb-item active"> Actualizar </li>
</ol>
@endsection --}}



@section('scripts')
    @include('backend.partials.ckeditor')
@endsection
