@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row py-4">
            <div class="col-5">
                <h1>{{ __('Ticket dashboard') }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>New</h4>
                    </div>
                    <div class="card-body">
                        <p>Number of tickets: {{ $newTickets }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Problem analysis/Solution</h4>
                    </div>
                    <div class="card-body">
                        <p>Number of tickets: {{ $analysisTickets }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Development/Acceptance</h4>
                    </div>
                    <div class="card-body">
                        <p>Number of tickets: {{ $devTickets }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Closed</h4>
                    </div>
                    <div class="card-body">
                        <p>Number of tickets: {{ $closedTickets }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
