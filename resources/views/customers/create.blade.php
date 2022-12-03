@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Customer') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="full_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Full name') }}</label>
                                <div class="col-md-6">
                                    <input id="full_name" type="text"
                                           class="form-control @error('full_name') is-invalid @enderror"
                                           name="full_name" placeholder="Enter the customers full name" autofocus required>
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="number"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
                                <div class="col-md-6">
                                    <input id="number" type="text"
                                           class="form-control @error('number') is-invalid @enderror"
                                           name="phone_number" placeholder="Enter your phone number">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" placeholder="Enter your email">
                                    @error('email')
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
                                        {{ __('Save') }}
                                    </button>

                                    <a href="{{ url()->previous() }}"
                                       class="btn btn-secondary float-end me-2">{{ __('Cancel') }}</a>

                                    <button type="reset" class="btn btn-danger me-2"
                                            title="This button will reset the form inputs">
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
