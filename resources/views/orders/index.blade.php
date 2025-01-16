@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">My Rides</h4>
                <a href="{{ route('orders.create') }}" class="btn btn-theme">
                    <i class="fas fa-plus me-1"></i> Book New Ride
                </a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($orders->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-car fa-3x mb-3 text-muted"></i>
                    <h5>No Rides Yet</h5>
                    <p class="text-muted">Book your first ride to get started!</p>
                    <a href="{{ route('orders.create') }}" class="btn btn-theme">
                        <i class="fas fa-plus me-1"></i> Book a Ride
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ride ID</th>
                                <th>Pickup Location</th>
                                <th>Drop-off Location</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ Str::limit($order->pickup_address, 30) }}</td>
                                    <td>{{ Str::limit($order->delivery_address, 30) }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case('pending')
                                                <span class="badge text-bg-warning">Awaiting Driver</span>
                                                @break
                                            @case('accepted')
                                                <span class="badge text-bg-info">Driver Assigned</span>
                                                @break
                                            @case('in_transit')
                                                <span class="badge text-bg-primary">In Progress</span>
                                                @break
                                            @case('delivered')
                                                <span class="badge text-bg-success">Completed</span>
                                                @break
                                            @case('cancelled')
                                                <span class="badge text-bg-danger">Cancelled</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                            View Details
                                        </a>
                                        @if($order->status === 'pending')
                                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to cancel this ride?')">
                                                    Cancel
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
    padding: 6px 10px;
}
.btn-sm {
    padding: 0.25rem 0.75rem;
}
.btn-theme {
    background-color: #c16512;
    border-color: #c16512;
    color: #fff;
}
.btn-theme:hover {
    background-color: #a85510;
    border-color: #a85510;
    color: #fff;
}
</style>
@endsection
