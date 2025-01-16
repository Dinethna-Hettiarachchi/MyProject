@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="avatar mb-3">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                        <span class="badge bg-theme">Member</span>
                    </div>
                    <div class="nav flex-column nav-pills">
                        <a href="#" class="nav-link active mb-2">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                        <a href="{{ route('orders.index') }}" class="nav-link mb-2">
                            <i class="fas fa-car me-2"></i> My Rides
                        </a>
                        <a href="#" class="nav-link mb-2">
                            <i class="fas fa-user me-2"></i> Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Welcome Section -->
            <div class="card welcome-card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="welcome-title">Welcome to EasyRides!</h2>
                            <p class="text-muted mb-4">Book your next ride with ease</p>
                            <a href="{{ route('orders.create') }}" class="btn btn-theme">
                                <i class="fas fa-plus me-2"></i> Book a Ride
                            </a>
                        </div>
                        <div class="col-md-4 text-end d-none d-md-block">
                            <i class="fas fa-car welcome-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card action-card">
                        <div class="card-body">
                            <div class="action-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <h5>New Ride</h5>
                            <p class="text-muted">Book a vehicle now</p>
                            <a href="{{ route('orders.create') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card action-card">
                        <div class="card-body">
                            <div class="action-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h5>Track Ride</h5>
                            <p class="text-muted">Monitor your current ride</p>
                            <a href="{{ route('orders.index') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card action-card">
                        <div class="card-body">
                            <div class="action-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <h5>Ride History</h5>
                            <p class="text-muted">View your past rides</p>
                            <a href="{{ route('orders.index') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Rides -->
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Rides</h5>
                        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-outline-theme">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ride ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="empty-state">
                                            <i class="fas fa-car empty-icon mb-3"></i>
                                            <p class="text-muted">No recent rides</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Base Styles */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12);
}

.card-header {
    border-bottom: 1px solid #eee;
    padding: 1rem;
}

/* Avatar */
.avatar {
    width: 70px;
    height: 70px;
    background-color: #c16512;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.avatar i {
    font-size: 1.8rem;
    color: white;
}

/* Navigation */
.nav-pills .nav-link {
    color: #666;
    border-radius: 8px;
    padding: 0.8rem 1rem;
    transition: all 0.2s ease;
}

.nav-pills .nav-link:hover {
    background-color: #fff5eb;
    color: #c16512;
}

.nav-pills .nav-link.active {
    background-color: #c16512;
    color: white;
}

/* Welcome Card */
.welcome-card {
    background: linear-gradient(145deg, #fff5eb 0%, #fff 100%);
    border: none;
}

.welcome-title {
    color: #2d3748;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.welcome-icon {
    font-size: 5rem;
    color: #c16512;
    opacity: 0.2;
}

/* Action Cards */
.action-card {
    transition: transform 0.2s ease;
    cursor: pointer;
}

.action-card:hover {
    transform: translateY(-5px);
}

.action-icon {
    width: 50px;
    height: 50px;
    background-color: #fff5eb;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.action-icon i {
    font-size: 1.5rem;
    color: #c16512;
}

/* Theme Colors */
.bg-theme {
    background-color: #c16512 !important;
}

.btn-theme {
    background-color: #c16512;
    border-color: #c16512;
    color: white;
}

.btn-theme:hover {
    background-color: #a85510;
    border-color: #a85510;
    color: white;
}

.btn-outline-theme {
    color: #c16512;
    border-color: #c16512;
}

.btn-outline-theme:hover {
    background-color: #c16512;
    border-color: #c16512;
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 2rem;
}

.empty-icon {
    font-size: 3rem;
    color: #c16512;
    opacity: 0.3;
    display: block;
}
</style>
@endsection
