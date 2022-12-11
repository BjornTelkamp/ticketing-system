@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="flex-grow-1 justify-content-start">
                        <h4 class="mb-0 lh-0">{{ __('Employee') }}</h4>
                    </div>
                    <div class="justify-content-end">
                        <a href="{{ route('employees.index') }}" class="btn btn-primary float-right">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="row">Employee information</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 50%">ID</th>
                                <td>{{ $employee->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">First name</th>
                                <td>{{ $employee->first_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last name</th>
                                <td>{{ $employee->last_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone number</th>
                                <td>{{ $employee->phone_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>{{ $employee->user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="row">Address information</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 50%">Address</th>
                                <td>{{ $employee->address }}</td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td>{{ $employee->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">ZIP code</th>
                                <td>{{ $employee->zip_code }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Country</th>
                                <td>{{ $employee->country }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created</th>
                                <td title="{{ date('m-d-Y H:i', strtotime($employee->created_at)) }}">{{ date ('m-d-Y', strtotime($employee->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last updated</th>
                                <td title="{{ date('m-d-Y H:i', strtotime($employee->updated_at)) }}">{{ date ('m-d-Y', strtotime($employee->updated_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
