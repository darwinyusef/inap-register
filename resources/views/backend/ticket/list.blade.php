@extends('backend.layout.app')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Problem</th>
                            <th>Email</th>
                            <th>Descripción</th>
                            @if (in_array('admin:ticket-resolve', $permission))
                                <th>Resolve</th>
                                <th>ACCIONES</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr class="{{ $ticket->id }}">
                                <td>{{ $ticket->problem }}</td>
                                <td>{{ $ticket->email }}</td>
                                <td>{!! $ticket->description !!}</td>
                                @if (in_array('admin:ticket-resolve', $permission))
                                    <td>{!! $ticket->resolve !!}</td>
                                    <td class="actions">
                                        <a style="display:inline-block" href="/tools/backend/tickets/{{ $ticket->id }}/edit">
                                            <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button> </a>

                                        <form style="display:inline-block" method="POST"
                                            action="{{ route('ticket.destroy', $ticket->id) }}" accept-charset="UTF-8"
                                            class="form-horizontal" data-form="{{ $ticket->id }}">
                                            <input name="_method" type="hidden" value="delete">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger delete btn-xs"><i
                                                    class="fa fa-trash" id="{{ $ticket->id }}"></i></button>
                                    </td>
                                @endif
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('title') INAP Ayudas Pedagogicas | Listado Ticket @endsection
@section('pageTitle')
<h3> Listado de Ticket <a href="/tools/backend/tickets/create" type="button" class="btn btn-success">Nuevo Ticket</a></h3>
@endsection

{{-- @section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/backend"> Home</a> </li>
    <li class="breadcrumb-item active">Ticket </li>
</ol>
@endsection --}}
