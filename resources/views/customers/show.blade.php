@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="flex-grow-1 justify-content-start">
                        <h4 class="mb-0 lh-0">{{ __('Customer') }}</h4>
                    </div>
                    <div class="justify-content-end">
                        <a href="{{ route('customers.index') }}" class="btn btn-primary float-right">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="row">Customer information</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{ $customer->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Full name</th>
                                <td>{{ $customer->full_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone number</th>
                                <td>{{ $customer->phone_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created</th>
                                <td title="{{ date('m-d-Y H:i', strtotime($customer->created_at)) }}">{{ date ('m-d-Y', strtotime($customer->created_at)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
