<?php

namespace App\Http\Controllers;

use App\Entities\Tickets;
use Illuminate\Http\Request;
use Session; 

class TicketsController extends Controller
{
    public function index(Request $request)
    {
        $cookie = json_decode($request->cookie('policies'));
        $permission = explode('|', $cookie->permission);

        $tickets = Tickets::all();
        return view('backend.ticket.list', compact('tickets', 'cookie', 'permission'));
    }

    public function create(Request $request)
    {
        $cookie = json_decode($request->cookie('policies'));
        $permission = explode('|', $cookie->permission);

        $allTickets = Tickets::all();
        return view('backend.ticket.create', compact('allTickets', 'cookie', 'permission'));
    }

    public function store(Request $request)
    {
        $cookie = json_decode($request->cookie('policies'));
       // $permission = explode('|', $cookie->permission);

        $make = $request->all();
        Tickets::create($make);
        Session::flash('snackbar-success', 'Ticket creado correctamente');
        return back();
    }

    public function edit($id, Request $request)
    {
        $cookie = json_decode($request->cookie('policies'));
        $permission = explode('|', $cookie->permission);

        $ticket = Tickets::findOrFail($id);
        return view('backend.ticket.update', compact('ticket', 'cookie', 'permission'));
    }

    public function update(Request $request, $id)
    {
        $cookie = json_decode($request->cookie('policies'));
        $permission = explode('|', $cookie->permission);

        $make = $request->all();
        Tickets::findOrFail($id)->update([
            'problem' => $make['problem'],
            'description' => $make['description'],
            'resolve' => $make['resolve'],
            'email' => $make['email'],
            'user_id' => $cookie->id,
        ]);
        Session::flash('snackbar-success', 'Ticket Actualizado correctamente');
        return back();
    }

    public function destroy($id, Request $request)
    {
        $cookie = json_decode($request->cookie('policies'));
        $permission = explode('|', $cookie->permission);

        $force = $request->input('force');
        $ticket = Tickets::findOrFail($id);
        if ($force == 1) {
            $ticket->forceDelete();
            Session::flash('snackbar-warning', 'La Ticket se ha Eliminado totalmente');
            return back();
        }
        $ticket->delete();
        Session::flash('snackbar-warning', 'La Ticket se ha envíado a la papelera');
        return back();
    }
}
