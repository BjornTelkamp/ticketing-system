@extends('layouts.app')

@section('content')
{{-- tickets index page --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tickets') }}

                    <a href="{{ route('tickets.create') }}" class="btn btn-primary float-right">Create Ticket</a>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets ?? [] as $ticket)
                            <tr>
                                <th scope="row">{{ $ticket->id }}</th>
                                <td><a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->title }}</a></td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td>{{ $ticket->updated_at }}</td>
                                <td>
                                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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
