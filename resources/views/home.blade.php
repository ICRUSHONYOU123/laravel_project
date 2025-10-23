<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Cheat - Shop Now</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --text-light: #e2e8f0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-light);
        }

        .navbar {
            background-color: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-light) !important;
        }

        .nav-link {
            color: var(--text-light) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px 32px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        .stats-section {
            background-color: var(--card-bg);
            padding: 60px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-color);
        }

        .stat-label {
            color: #94a3b8;
            font-size: 1rem;
        }

        .feature-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .testimonial-card {
            background-color: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
        }

        .testimonial-stars {
            color: #fbbf24;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .pricing-card {
            background-color: var(--card-bg);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            transition: transform 0.3s, border-color 0.3s;
        }

        .pricing-card:hover {
            transform: scale(1.05);
            border-color: var(--primary-color);
        }

        .pricing-card.featured {
            border-color: var(--primary-color);
            position: relative;
        }

        .badge-featured {
            position: absolute;
            top: -15px;
            right: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
        }

        .price {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-light);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 80px 0;
            margin: 80px 0;
            border-radius: 20px;
        }

        footer {
            background-color: var(--card-bg);
            padding: 40px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Prime Cheat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    @guest
                    <!-- Show when user is NOT logged in -->
                    <li class="nav-item g-3">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">Register</a>
                    </li>
                    @endguest
                    @auth
                    <!-- Show when user IS logged in -->
                    <li class="nav-item g-3">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="badge bg-primary mb-3">New Release 2025</div>
                    <h1 class="hero-title">The best games cheats ever on the market</h1>
                    <p class="hero-subtitle">If you’re looking for the best cheats for Rust, Ark, ASA & ASE, CS2, or PUBG Battlegrounds, fully safe for your main account, you can get them here at the best price.Cheap, Powerful, The best features, Fully responsible,100% Trust</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#pricing" class="btn btn-primary btn-lg"><i class="bi bi-cart-fill me-2"></i>Show Now</a>
                        <a href="{{route('profile.update')}}" class="btn btn-outline-secondary btn-lg"><i class="bi bi-play-circle me-2"></i>Watch Demo</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/logo.png') }}" alt="Premium Wireless Headphones" class="product-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4 mb-md-0">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="col-md-3 col-6 mb-4 mb-md-0">
                    <div class="stat-number">4.9</div>
                    <div class="stat-label">Average Rating</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-number">40hrs</div>
                    <div class="stat-label">Battery Life</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-number">2 Year</div>
                    <div class="stat-label">Warranty</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-3">Premium Products</h2>
                <p class="lead text-muted">Engineered for perfection, designed for you</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card card h-100 d-flex flex-column">
                        <div class="feature-icon text-center my-3">
                            <i class="bi bi-controller fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3 text-white">Rust Premium Cheat</h3>
                        <div class="card-img-wrapper text-center">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.6wucsv2ZOcU_Vn6OrXiEOAHaEK?pid=Api&P=0&h=220"
                                alt="Rust Premium Cheat"
                                class="img-fluid rounded mb-5"
                                style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="mt-auto text-center my-3">
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, ducimus.</p>
                            <a href="#" class="btn btn-success">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 d-flex flex-column">
                        <div class="feature-icon text-center my-3">
                            <i class="bi bi-controller fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3 text-white">CS2 Cheat</h3>
                        <div class="card-img-wrapper text-center">
                            <img src="https://tse3.mm.bing.net/th/id/OIP.LHyZOSXh8ZLpWq9-eJzmYQHaEK?pid=Api&P=0&h=220"
                                alt="Rust Premium Cheat"
                                class="img-fluid rounded mb-5"
                                style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="mt-auto text-center my-3">
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, ducimus.</p>
                            <a href="#" class="btn btn-success">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 d-flex flex-column">
                        <div class="feature-icon text-center my-3">
                            <i class="bi bi-controller fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3 text-white">ARK Ascended Cheat</h3>
                        <div class="card-img-wrapper text-center">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.Lcq1j7oMvMeLdLK7KpVfQQHaEK?pid=Api&P=0&h=220"
                                alt="Rust Premium Cheat"
                                class="img-fluid rounded mb-5"
                                style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="mt-auto text-center my-3">
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, ducimus.</p>
                            <a href="#" class="btn btn-success">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 d-flex flex-column">
                        <div class="feature-icon text-center my-3">
                            <i class="bi bi-controller fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3 text-white">ARK:Survival</h3>
                        <div class="card-img-wrapper text-center">
                            <img src="https://tse3.mm.bing.net/th/id/OIP.wxavt8M6nfuJLu9rmRaeQwHaEK?pid=Api&P=0&h=220"
                                alt="Rust Premium Cheat"
                                class="img-fluid rounded mb-5"
                                style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="mt-auto text-center my-3">
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, ducimus.</p>
                            <a href="#" class="btn btn-success">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 d-flex flex-column">
                        <div class="feature-icon text-center my-3">
                            <i class="bi bi-controller fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3 text-white">valorant</h3>
                        <div class="card-img-wrapper text-center">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.TWSo_lejU0wlsp6jut5LOwHaEK?pid=Api&P=0&h=220"
                                alt="Rust Premium Cheat"
                                class="img-fluid rounded mb-5"
                                style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="mt-auto text-center my-3">
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, ducimus.</p>
                            <a href="#" class="btn btn-success">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card card h-100 d-flex flex-column">
                        <div class="feature-icon text-center my-3">
                            <i class="bi bi-controller fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3 text-white">Falight84</h3>
                        <div class="card-img-wrapper text-center">
                            <img src="https://tse2.mm.bing.net/th/id/OIP.nL1ND_HdbwAbmKBFpxqd6wHaEK?pid=Api&P=0&h=220"
                                alt="Rust Premium Cheat"
                                class="img-fluid rounded mb-5"
                                style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="mt-auto text-center my-3">
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, ducimus.</p>
                            <a href="#" class="btn btn-success">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-3">What Our Customers Say</h2>
                <p class="lead text-muted">Join thousands of satisfied customers worldwide</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-4">"Best headphones I've ever owned. The sound quality is incredible and the noise cancellation is a game-changer for my daily commute."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.rUhFzy80SUo58R00TBo8zQHaHa?pid=Api&P=0&h=220" alt="Sarah Johnson" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <div class="fw-bold">Sarah Johnson</div>
                                <div class="text-muted small">Music Producer</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-4">"The battery life is amazing! I charge them once a week and use them every day. Comfort is top-notch even for long listening sessions."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.rUhFzy80SUo58R00TBo8zQHaHa?pid=Api&P=0&h=220" alt="Michael Chen" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <div class="fw-bold">Michael Chen</div>
                                <div class="text-muted small">Software Engineer</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-4">"Worth every penny! The build quality is premium and they look as good as they sound. Customer service was excellent too."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.rUhFzy80SUo58R00TBo8zQHaHa?pid=Api&P=0&h=220" alt="Emily Rodriguez" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <div class="fw-bold">Emily Rodriguez</div>
                                <div class="text-muted small">Content Creator</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-3">Choose Your Package</h2>
                <p class="lead text-muted text-bold">Find the perfect option for your needs</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <h3 class="h4 mb-3">1 Day Key</h3>
                        <div class="price mb-3">$5</div>
                        <p class="text-muted mb-4">Everything you need to get started</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>ESP</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Players</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>PvP</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>MIS</li>
                        </ul>
                        <a href="{{route('buynow')}}" class="btn btn-outline-light w-100"><i class="bi bi-cart-plus">Buy Now</i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card featured">
                        <span class="badge-featured">Most Popular</span>
                        <h3 class="h4 mb-3">1 Week Key</h3>
                        <div class="price mb-3">$15</div>
                        <p class="text-muted mb-4">Best value for serious listeners</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>ESP</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Players</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>PvP</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>MIS</li>
                        </ul>
                        <a href="{{route('buynow')}}" class="btn btn-outline-light w-100"><i class="bi bi-cart-plus">Buy Now</i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <h3 class="h4 mb-3">1 Month Key</h3>
                        <div class="price mb-3">$50</div>
                        <p class="text-muted mb-4">Complete professional package</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>ESP</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Players</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>PvP</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>MIS (Private Feature)</li>
                        </ul>
                        <a href="{{route('buynow')}}" class="btn btn-outline-light w-100"><i class="bi bi-cart-plus">Buy Now</i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container">
        <div class="cta-section text-center">
            <h2 class="display-4 fw-bold mb-3">Ready to buy your key?</h2>
            <p class="lead mb-4">Join 50,000+ satisfied customers and experience premium sound today</p>
            <button class="btn btn-light btn-lg px-5">
                <i class="bi bi-cart-fill me-2"></i>Shop Now
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Prime Cheat</h5>
                    <p class="text-muted">Premium audio equipment for discerning listeners worldwide.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-light"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-youtube fs-5"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3">Product</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Features</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Reviews</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Specs</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3">Company</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">About</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Careers</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Help Center</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Warranty</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Shipping</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Returns</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6 class="fw-bold mb-3">Legal</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Privacy</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Terms</a></li>
                        <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center text-muted">
                <p class="mb-0">&copy; 2025 SoundWave. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
