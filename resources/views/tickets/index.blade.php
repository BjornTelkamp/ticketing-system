@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="flex-grow-1 justify-content-start">
                        <h4 class="mb-0 lh-0">{{ __('Tickets') }}</h4>
                    </div>
                    <div class="justify-content-end">
                        <a href="{{ route('tickets.create') }}" class="btn btn-primary float-right">Create</a>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets ?? [] as $ticket)
                            <tr>
                                <th scope="row">{{ $ticket->id }}</th>
                                <td><a href="{{ route('tickets.show', $ticket->id) }}" class="link-primary text-black fw-bold">{{ $ticket->title }}</a></td>
                                <td>
                                    @php($status = $ticket->status()->first())
                                    <span class="badge {{ $status->color }} p-2">
                                        {{ ucfirst($status->name) }}
                                    </span>
                                </td>
                                <td title="{{ date('m-d-Y H:i', strtotime($ticket->created_at)) }}">{{ date('d-m-Y', strtotime($ticket->created_at)) }}</td>
                                <td width="20%">
                                    <div class=" d-flex justify-content-end">
                                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-secondary rounded-0 rounded-start">Edit</a>
                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
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
