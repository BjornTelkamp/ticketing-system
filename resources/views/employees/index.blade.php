@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="flex-grow-1 justify-content-start">
                        <h4 class="mb-0 lh-0">{{ __('Employees') }}</h4>
                    </div>
                    <div class="justify-content-end">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary float-right">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">User email</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">ZIP code</th>
                                <th scope="col">Country</th>
                                <th scope="col">Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees ?? [] as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->user_id }} <br> <small>({{ $employee->user->name }})</small></td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}">
                                        {{ $employee->first_name }}
                                    </a>
                                </td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ $employee->user->email }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->city }}</td>
                                <td>{{ $employee->zip_code }}</td>
                                <td>{{ $employee->country }}</td>
                                <td title="{{ date('m-d-Y H:i', strtotime($employee->created_at)) }}">{{ date('d-m-Y', strtotime($employee->created_at)) }}</td>
                                <td width="">
                                    <div class=" d-flex justify-content-end">
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-secondary rounded-0 rounded-start">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-0 rounded-end">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
