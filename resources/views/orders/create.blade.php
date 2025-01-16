@extends('layouts.app')

@section('title', 'Book Ride - EasyRides')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0" style="color: #c16512;">Book New Ride</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="pickup_address" class="form-label">Pickup Address</label>
                            <textarea id="pickup_address" class="form-control @error('pickup_address') is-invalid @enderror" 
                                name="pickup_address" rows="2" required>{{ old('pickup_address') }}</textarea>
                            @error('pickup_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="delivery_address" class="form-label">Dropoff Address</label>
                            <textarea id="delivery_address" class="form-control @error('delivery_address') is-invalid @enderror" 
                                name="delivery_address" rows="2" required>{{ old('delivery_address') }}</textarea>
                            @error('delivery_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="package_description" class="form-label">Ride Details</label>
                            <textarea id="package_description" class="form-control @error('package_description') is-invalid @enderror" 
                                name="package_description" rows="3" required>{{ old('package_description') }}</textarea>
                            <div class="form-text">Please provide details about your ride (number of passengers, preferred vehicle type, etc.)</div>
                            @error('package_description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back to Rides
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle me-1"></i> Book Ride
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
        border-radius: 10px;
    }
    .card-header {
        background: white;
        border-bottom: 1px solid rgba(0,0,0,0.1);
        padding: 20px;
    }
    .form-control {
        padding: 12px;
        border-radius: 5px;
    }
    .form-control:focus {
        border-color: #c16512;
        box-shadow: 0 0 0 0.2rem rgba(193,101,18,0.25);
    }
    .btn-success {
        background-color: #c16512;
        border-color: #c16512;
    }
    .btn-success:hover {
        background-color: #a9560a;
        border-color: #a9560a;
    }
</style>
@endsection
