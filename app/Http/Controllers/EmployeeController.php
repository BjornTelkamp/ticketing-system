<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * An array of the validation rules.
     * @return string[]
     */
    public function rules(): array {
        return [
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('employees.index')->with('employees', Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('employees.create')->with(['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, $this->rules());

        Employee::create([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        return view('employees.show')->with('employee', Employee::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('employees.edit')->with(['employee' => Employee::find($id), 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, $this->rules());
        $employee = Employee::findOrFail($id);
        $employee?->update($request->all());

        return redirect()->route('employees.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Employee::destroy($id);

        return redirect()->route('employees.index');
    }
}
