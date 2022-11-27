@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="flex-grow-1 justify-content-start">
                        <h4 class="mb-0 lh-0">{{ __('Customers') }}</h4>
                    </div>
                    <div class="justify-content-end">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary float-right">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers ?? [] as $customer)
                            <tr>
                                <th scope="row">{{ $customer->id }}</th>
                                <td>
                                    <a href="{{ route('customers.show', $customer->id) }}">
                                        {{ $customer->full_name }}
                                    </a>
                                </td>
                                <td>{{ $customer->phone_number }}</td>
                                <td>{{ $customer->email }}</td>
                                <td title="{{ date('m-d-Y H:i', strtotime($customer->created_at)) }}">{{ date ('m-d-Y', strtotime($customer->created_at)) }}</td>
                                <td>
                                    <div class=" d-flex justify-content-end">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary rounded-0 rounded-start">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
