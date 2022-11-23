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
                                <th scope="col">User name</th>
                                <th scope="col">User email</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees ?? [] as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->user_id }}</td>
                                <td>{{ $employee->getUser()->name }}</td>
                                <td>{{ $employee->getUser()->email }}</td>
                                <td title="{{ date('m-d-Y H:i', strtotime($employee->created_at)) }}">{{ date('d-m-Y', strtotime($employee->created_at)) }}</td>
                                <td title="{{ date('m-d-Y H:i', strtotime($employee->updated_at)) }}">{{ date('d-m-Y', strtotime($employee->updated_at)) }}</td>
                                <td width="20%">
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