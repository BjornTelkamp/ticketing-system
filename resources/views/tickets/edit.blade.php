@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Ticket') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $ticket->title }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $ticket->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status_id" required autocomplete="status" autofocus>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $ticket->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="customer" class="col-md-4 col-form-label">{{ __('Customer') }}</label>
                                <div class="col-md-6">
                                    <select id="customer" class="form-control @error('customer') is-invalid @enderror" name="customer_id" required autocomplete="customer" autofocus>
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ $ticket->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->full_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="employee" class="col-md-4 col-form-label">{{ __('Employees') }}</label>
                                <div class="col-md-6">
                                    <select id="employee" class="form-control @error('employee') is-invalid @enderror" name="employee_id[]" required autocomplete="employee" autofocus multiple>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}" @foreach($ticket->employees()->get() as $e) @if($e->id == $employee->id) {{ 'selected' }} @endif @endforeach >{{ $employee->getUser()->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('employee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary float-end">
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary float-end me-2">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
