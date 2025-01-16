<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyRides - Your Premium Vehicle Hiring Service</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #c16512;
            --secondary-color: #333333;
        }
        body {
            background-color: #ffffff;
            color: var(--secondary-color);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #ffffff !important;
            box-shadow: 0 2px 4px rgba(193, 101, 18, 0.1);
            padding: 1.2rem 2rem;
        }
        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: bold;
            font-size: 1.8rem;
        }
        .hero-section {
            display: flex;
            min-height: 85vh;
            background: none;
        }
        .hero-left {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3') center/cover no-repeat;
        }
        .hero-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5rem;
            background-color: #f8f9fa;
        }
        .hero-right h1 {
            font-weight: 800;
            font-size: 3.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        .hero-right p {
            font-size: 1.4rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .feature-card {
            background-color: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(193, 101, 18, 0.1);
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        .feature-card:hover::before {
            width: 100%;
            opacity: 0.1;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(193, 101, 18, 0.2);
        }
        .feature-card img {
            height: 250px;
            object-fit: cover;
            width: 100%;
            border-radius: 15px;
            margin-top: 2rem;
        }
        .feature-icon {
            color: var(--primary-color);
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }
        .btn-success {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 15px 40px;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 30px;
        }
        .btn-success:hover {
            background-color: #a55610;
            border-color: #a55610;
            transform: translateY(-2px);
        }
        .btn-outline-success {
            color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 15px 40px;
            font-weight: 600;
            border-radius: 30px;
        }
        .btn-outline-success:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        .features {
            background-color: #ffffff;
            padding: 100px 0;
        }
        .features h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 3rem;
            position: relative;
        }
        .features h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
        }
        .service-card {
            text-align: center;
            margin-bottom: 40px;
            padding: 2rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .service-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }
        .service-image:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 80px 0 40px;
            margin-top: auto;
        }
        footer a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }
        footer a:hover {
            color: white;
            opacity: 0.8;
        }
        footer h5 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        footer ul li {
            margin-bottom: 1rem;
        }
        .btn-outline-light {
            border-width: 2px;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px 35px;
        }
        .btn-outline-light:hover {
            background-color: white;
            color: var(--primary-color);
        }
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
            }
            .hero-left, .hero-right {
                flex: none;
                width: 100%;
            }
            .hero-left {
                height: 50vh;
            }
            .hero-right {
                padding: 3rem 1.5rem;
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
                    <li class="nav-item">
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn btn-outline-success me-3">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="hero-left"></div>
        <div class="hero-right">
            <h1>Your Journey,<br>Our Priority</h1>
            <p>Experience premium vehicle hiring with professional drivers at your service. Book your ride today and travel in style.</p>
            <div class="d-flex gap-3">
                <a href="{{ route('register') }}" class="btn btn-success">Get Started</a>
                <a href="{{ route('login') }}" class="btn btn-outline-success">Sign In</a>
            </div>
        </div>
    </section>

    <section class="features py-5">
        <div class="container">
            <h2 class="text-center">Why Choose EasyRides?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <i class="fas fa-car-side feature-icon"></i>
                        <h4>Premium Fleet</h4>
                        <p>Choose from our selection of luxury and comfortable vehicles</p>
                        <img src="https://images.unsplash.com/photo-1550355291-bbee04a92027?ixlib=rb-4.0.3" class="img-fluid" alt="Premium Fleet">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <i class="fas fa-user-tie feature-icon"></i>
                        <h4>Expert Drivers</h4>
                        <p>Professional and courteous drivers at your service</p>
                        <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-4.0.3" class="img-fluid" alt="Expert Drivers">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center">
                        <i class="fas fa-shield-alt feature-icon"></i>
                        <h4>Safe & Secure</h4>
                        <p>Your safety is our top priority with verified drivers</p>
                        <img src="https://images.unsplash.com/photo-1592853625597-7d17be820d0c?ixlib=rb-4.0.3" class="img-fluid" alt="Safe & Secure">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <h2 class="text-center mb-5">How It Works</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="step-number">1</div>
                    <h4>Register</h4>
                    <p>Create your account in minutes</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="step-number">2</div>
                    <h4>Book Delivery</h4>
                    <p>Enter pickup and delivery details</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="step-number">3</div>
                    <h4>Track & Receive</h4>
                    <p>Monitor your delivery in real-time</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>About EasyRides</h5>
                    <p>Your trusted delivery partner in Sri Lanka, ensuring fast and secure delivery services across the country.</p>
                </div>
                <div class="col-md-6">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i> +94 11 234 5678</li>
                        <li><i class="fas fa-envelope me-2"></i> info@easyrides.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Galle Road, Colombo 03, Sri Lanka</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 EasyRides. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
