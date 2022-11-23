@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Employee') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="customer" class="col-md-4 col-form-label text-md-right">{{ __('Customer') }}</label>
                                <div class="col-md-6">
                                    <select id="customer" class="form-control @error('customer') is-invalid @enderror" name="customer_id" required autocomplete="customer" autofocus>
                                        <option value="">Select Customer</option>
                                        @foreach ($customers ?? [] as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
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
                                        @foreach ($employees ?? [] as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->getUser()->name }}</option>
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
                                        {{ __('Create') }}
                                    </button>

                                    <a href="{{ url()->previous() }}" class="btn btn-secondary float-end me-2">{{ __('Cancel') }}</a>

                                    <button type="reset" class="btn btn-danger me-2" title="This button will reset the form inputs">
                                        {{ __('Reset') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
