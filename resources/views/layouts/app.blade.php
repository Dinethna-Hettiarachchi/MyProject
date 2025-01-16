<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'EasyRides'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #c16512;
            --hover-color: #a55610;
            --secondary-color: #333333;
        }
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(193, 101, 18, 0.1);
            padding: 1.2rem 2rem;
        }
        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: bold;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        .navbar-brand:hover {
            color: var(--hover-color) !important;
        }
        .btn {
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .btn-success {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            font-weight: 500;
        }
        .btn-success:hover {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
        }
        .btn-outline-success {
            color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            font-weight: 500;
        }
        .btn-outline-success:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(193, 101, 18, 0.1);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(193, 101, 18, 0.15);
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(193, 101, 18, 0.1);
            border-radius: 15px;
            padding: 0.5rem;
        }
        .dropdown-item {
            padding: 0.7rem 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .dropdown-item:hover {
            background-color: rgba(193, 101, 18, 0.1);
            color: var(--primary-color);
        }
        .dropdown-item i {
            color: var(--primary-color);
            width: 20px;
        }
        .nav-link {
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: var(--primary-color);
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(193, 101, 18, 0.15);
        }
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            .btn {
                padding: 0.6rem 1.2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-car me-2"></i>EasyRides
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <div class="d-flex">
                                <a href="{{ route('login') }}" class="btn btn-outline-success me-2">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('orders.index') }}">
                                        <i class="fas fa-box me-2"></i>My Orders
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
