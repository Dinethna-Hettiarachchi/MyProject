@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('My Deliveries') }}</span>
                    <a href="{{ route('deliveries.create') }}" class="btn btn-success btn-sm">Request New Delivery</a>
                </div>

                <div class="card-body">
                    @if($deliveries->isEmpty())
                        <p class="text-center">No deliveries found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pickup</th>
                                        <th>Delivery</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deliveries as $delivery)
                                        <tr>
                                            <td>{{ $delivery->id }}</td>
                                            <td>{{ $delivery->pickup_location }}</td>
                                            <td>{{ $delivery->delivery_location }}</td>
                                            <td>
                                                <span class="badge bg-{{ $delivery->status === 'delivered' ? 'success' : ($delivery->status === 'cancelled' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($delivery->status) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($delivery->amount, 2) }}</td>
                                            <td>
                                                <a href="{{ route('deliveries.show', $delivery) }}" class="btn btn-success btn-sm">View</a>
                                                @if($delivery->status === 'pending')
                                                    <form action="{{ route('deliveries.destroy', $delivery) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this delivery?')">Cancel</button>
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
    </div>
</div>
@endsection
