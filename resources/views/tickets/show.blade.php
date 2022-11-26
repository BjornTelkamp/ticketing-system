@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="flex-grow-1 justify-content-start">
                            <h3>{{ __('Ticket Details ') }}</h3>
                        </div>
                        <div class="justify-content-end">
                            <a href="{{ route('tickets.edit', $ticket->id) }}?referrer=show" class="btn btn-primary float-right">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $ticket->id }}</th>
                                    <td>{{ $ticket->title }}</td>
                                    <td>
                                        @php($status = $ticket->status()->first())
                                        <span class="badge {{ $status->color }} p-2">
                                        {{ ucfirst($status->name) }}
                                        </span>
                                    </td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        {{ $ticket->description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
