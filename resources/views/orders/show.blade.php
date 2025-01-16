@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Ride #{{ $order->id }}</h4>
                        @if($order->status === 'pending')
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to cancel this ride?')">
                                    Cancel Ride
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <div class="d-flex align-items-center">
                            <h6 class="text-muted me-3 mb-0">Status:</h6>
                            <div>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark fs-6">Awaiting Driver</span>
                                @elseif($order->status == 'accepted')
                                    <span class="badge bg-info text-white fs-6">Driver Assigned</span>
                                @elseif($order->status == 'in_transit')
                                    <span class="badge bg-primary text-white fs-6">In Progress</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge bg-success text-white fs-6">Completed</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="badge bg-danger text-white fs-6">Cancelled</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Booked On</h6>
                            <p>{{ $order->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p>{{ $order->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="mb-2">Pickup Location</h6>
                                    <p class="mb-0">{{ $order->pickup_address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="mb-2">Drop-off Location</h6>
                                    <p class="mb-0">{{ $order->delivery_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <h6 class="mb-2">Additional Notes</h6>
                            <p class="mb-0">{{ $order->package_description }}</p>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                            Back to Rides
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12);
}
.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
}
.badge {
    font-weight: 500;
    padding: 8px 16px;
    border-radius: 6px;
}
.badge.fs-6 {
    font-size: 0.9rem !important;
}
.bg-light {
    background-color: #f8f9fa !important;
}
.card .card {
    box-shadow: none;
}
.bg-warning {
    background-color: #ffc107 !important;
}
.bg-info {
    background-color: #0dcaf0 !important;
}
.bg-primary {
    background-color: #0d6efd !important;
}
.bg-success {
    background-color: #198754 !important;
}
.bg-danger {
    background-color: #dc3545 !important;
}
.text-white {
    color: #fff !important;
}
.text-dark {
    color: #212529 !important;
}
</style>
@endsection
