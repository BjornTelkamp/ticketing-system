<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Status;
use App\Models\Employee;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('tickets.index')->with('tickets', Ticket::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('tickets.create')->with(['customers' => Customer::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : redirectResponse
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'customer_id' => 'required',
        ]);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'customer_id' => $request->customer_id,
            'status_id' => 1,
        ]);

        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('tickets.show')->with('ticket', Ticket::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('tickets.edit')->with([
            'ticket' => Ticket::find($id),
            'customers' => Customer::all(),
            'statuses' => Status::all(),
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
            'customer_id' => 'required',
            'employee_id' => 'required',
        ]);

        $ticket = Ticket::find($id);

        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->status_id = $request->input('status_id');
        $ticket->customer_id = $request->input('customer_id');

        $ticket->save();

        $ticket->employees()->sync($request->input('employee_id'));

        return redirect()->route('tickets.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
