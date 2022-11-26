@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="flex-grow-1 justify-content-start">
                            <h3>{{ __('Employee Details ') }}</h3>
                        </div>
                        <div class="justify-content-end">
                            <a href="{{ route('employees.edit', $employee->id) }}?referred=show" class="btn btn-primary float-right">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full name</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $employee->id }}</th>
                                    <td>{{ $employee->getFullName() }}</td>
                                    <td>{{ $employee->created_at }}</td>
                                    <td>{{ $employee->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
