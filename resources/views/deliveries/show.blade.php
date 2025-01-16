@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Delivery Details') }}</span>
                    <a href="{{ route('deliveries.index') }}" class="btn btn-success btn-sm">Back to List</a>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Delivery ID:</div>
                        <div class="col-md-8">{{ $delivery->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Status:</div>
                        <div class="col-md-8">
                            <span class="badge bg-{{ $delivery->status === 'delivered' ? 'success' : ($delivery->status === 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($delivery->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Pickup Location:</div>
                        <div class="col-md-8">{{ $delivery->pickup_location }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Delivery Location:</div>
                        <div class="col-md-8">{{ $delivery->delivery_location }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Amount:</div>
                        <div class="col-md-8">${{ number_format($delivery->amount, 2) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Created At:</div>
                        <div class="col-md-8">{{ $delivery->created_at->format('M d, Y H:i A') }}</div>
                    </div>

                    @if($delivery->driver)
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Driver:</div>
                            <div class="col-md-8">{{ $delivery->driver->user->name }}</div>
                        </div>
                    @endif

                    @if($delivery->status === 'pending')
                        <div class="mt-4">
                            <form action="{{ route('deliveries.destroy', $delivery) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this delivery?')">
                                    Cancel Delivery
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
