@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Request New Delivery') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('deliveries.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="pickup_location" class="form-label">{{ __('Pickup Location') }}</label>
                            <input id="pickup_location" type="text" class="form-control @error('pickup_location') is-invalid @enderror" name="pickup_location" value="{{ old('pickup_location') }}" required>
                            @error('pickup_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="delivery_location" class="form-label">{{ __('Delivery Location') }}</label>
                            <input id="delivery_location" type="text" class="form-control @error('delivery_location') is-invalid @enderror" name="delivery_location" value="{{ old('delivery_location') }}" required>
                            @error('delivery_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">{{ __('Amount ($)') }}</label>
                            <input id="amount" type="number" step="0.01" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-success">
                                {{ __('Create Delivery Request') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
