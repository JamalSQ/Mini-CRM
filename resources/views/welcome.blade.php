<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Landing Page</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Montserrat', Arial, sans-serif;
      background: #f7f9fb;
    }
    .navbar-brand img {
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .navbar .nav-link {
      font-weight: 500;
      transition: color .2s;
    }
    .navbar .nav-link:hover {
      color: #0d6efd;
    }
    .hero-section {
      position: relative;
      color: #fff;
      min-height: 480px;
      background: linear-gradient(rgba(13, 110, 253, 0.9),rgba(13, 110, 253, 0.75)), url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .hero-content .brand-logo-img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 10px;
      border: 3px solid #fff;
      background: #fff;
    }
    .btn-custom {
      background: #fff;
      color: #0d6efd;
      border-radius: 30px;
      padding: 12px 36px;
      font-weight: 600;
      box-shadow: 0 2px 16px rgba(13, 110, 253, 0.2);
      transition: background .2s, color .2s, transform .2s;
    }
    .btn-custom:hover {
      background: #0d6efd;
      color: #fff;
      transform: translateY(-2px) scale(1.03);
    }
    .feature-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 64px;
      height: 64px;
      border-radius: 50%;
      background: #e8f0fe;
      margin-bottom: 16px;
      font-size: 2rem;
      color: #0d6efd;
      box-shadow: 0 2px 12px rgba(13, 110, 253, 0.05);
      transition: background 0.2s, color 0.2s;
    }
    .feature-icon:hover {
      background: #0d6efd;
      color: #fff;
    }
    .card-category {
      border: none;
      transition: box-shadow .2s, transform .2s;
      border-radius: 20px;
      box-shadow: 0 2px 18px 0 rgba(13,110,253,.06);
      overflow: hidden;
    }
    .card-category:hover {
      box-shadow: 0 6px 28px 0 rgba(13,110,253,.14);
      transform: translateY(-3px) scale(1.01);
    }
    .testimonial-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 2px 18px 0 rgba(13,110,253,.10);
      padding: 2rem 1rem 1.5rem 1rem;
      min-height: 240px;
      position: relative;
    }
    .testimonial-avatar {
      width: 64px;
      height: 64px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #0d6efd;
      margin-bottom: 12px;
      margin-top: -48px;
      background: #fff;
    }
    .testimonial-quote {
      color: #0d6efd;
      font-size: 28px;
      position: absolute;
      top: 0.5rem;
      left: 1.2rem;
      opacity: 0.25;
    }
    .footer-link {
      color: #fff;
      text-decoration: underline;
      opacity: .7;
      transition: opacity 0.2s;
    }
    .footer-link:hover { opacity: 1; }
    /* Contact form style */
    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 .15rem rgba(13,110,253,.10);
    }
    /* Responsive: Hero adjustments */
    @media (max-width: 768px) {
      .hero-section {
        min-height: 300px;
        padding: 2rem 0;
      }
      .hero-content .brand-logo-img {
        width: 56px;
        height: 56px;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Brand" loading="lazy">
        CRM
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#info">Info</a></li>
          <li class="nav-item"><a class="nav-link" href="#categories">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="mx-3">
            <button type="button" class="btn btn-outline bg-info btn-sm px-4">
                <a href="{{route('login.form')}}">Login</a>
            </button>

            <button type="button" class="btn btn-warning btn-sm px-4">
                <a href="{{route('register.form')}}">Sign-up</a>
            </button>
      </div>
    </div>
  </nav> -->

  <x-layouts.header/>
  <!-- Hero Section -->
  <header class="hero-section">
    <div class="container hero-content text-center">
      <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Brand Logo" class="brand-logo-img shadow-sm" loading="lazy">
      <h1 class="display-4 fw-bold mt-2 mb-3">Welcome to <span style="color: #87ceeb">My CRM</span></h1>
      <p class="lead mb-4 opacity-90">Your one-stop solution for everything you need.<br>
      Start your journey with a vivid mindset and let us do the magic.</p>
      <a href="{{route('login.form')}}" class="btn btn-custom btn-lg shadow-sm">Ready To Shine<i class="fas fa-arrow-right ms-2"></i></a>
    </div>
  </header>

  <!-- Info Section -->
  <section id="info" class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4 fw-bold">Why Choose Us?</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div>
            <span class="feature-icon"><i class="fas fa-bolt"></i></span>
          </div>
          <h5 class="fw-semibold mt-3">Fast & Reliable</h5>
          <p>Quick solutions with top-notch reliability for your needs.</p>
        </div>
        <div class="col-md-4">
          <div>
            <span class="feature-icon"><i class="fas fa-shield-alt"></i></span>
          </div>
          <h5 class="fw-semibold mt-3">Secure</h5>
          <p>Your data and privacy are our highest priority.</p>
        </div>
        <div class="col-md-4">
          <div>
            <span class="feature-icon"><i class="fas fa-thumbs-up"></i></span>
          </div>
          <h5 class="fw-semibold mt-3">Trusted</h5>
          <p>Thousands of customers trust us every day.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section id="categories" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4 fw-bold">Our Categories</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card card-category h-100">
            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?fit=crop&w=600&q=80" class="card-img-top" alt="Technology" loading="lazy">
            <div class="card-body text-center">
              <span class="feature-icon mb-2" style="background:#c7ebff;"><i class="fas fa-laptop"></i></span>
              <h5 class="card-title fw-semibold">Technology</h5>
              <p class="card-text">Explore our tech-based products and services.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-category h-100">
            <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?fit=crop&w=600&q=80" class="card-img-top" alt="Business" loading="lazy">
            <div class="card-body text-center">
              <span class="feature-icon mb-2" style="background:#ffe7ba;"><i class="fas fa-briefcase"></i></span>
              <h5 class="card-title fw-semibold">Business</h5>
              <p class="card-text">Solutions crafted for modern businesses.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-category h-100">
            <img src="https://mind.help/wp-content/uploads/2022/05/Health.jpg?fit=crop&w=600&q=80" class="card-img-top" alt="Health" loading="lazy">
            <div class="card-body text-center">
              <span class="feature-icon mb-2" style="background:#ffd7e1;"><i class="fas fa-heartbeat"></i></span>
              <h5 class="card-title fw-semibold">Health</h5>
              <p class="card-text">Innovations to support your well-being.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section id="testimonials" class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4 fw-bold">What Our Clients Say</h2>
      <div class="row g-4 mt-4 justify-content-center">
        <div class="col-md-4">
          <div class="testimonial-card position-relative pt-0">
            <div class="testimonial-quote"><i class="fas fa-quote-left"></i></div>
            <img src="https://randomuser.me/api/portraits/women/52.jpg" class="testimonial-avatar shadow" alt="Sarah Khan" loading="lazy">
            <blockquote class="blockquote mt-3">
              <p>"Amazing experience! Highly recommended."</p>
              <footer class="blockquote-footer">Sarah Khan</footer>
            </blockquote>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card position-relative pt-0">
            <div class="testimonial-quote"><i class="fas fa-quote-left"></i></div>
            <img src="https://randomuser.me/api/portraits/men/77.jpg" class="testimonial-avatar shadow" alt="John Ali" loading="lazy">
            <blockquote class="blockquote mt-3">
              <p>"The team was professional and efficient."</p>
              <footer class="blockquote-footer">John Ali</footer>
            </blockquote>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card position-relative pt-0">
            <div class="testimonial-quote"><i class="fas fa-quote-left"></i></div>
            <img src="https://randomuser.me/api/portraits/women/65.jpg" class="testimonial-avatar shadow" alt="Ayesha Malik" loading="lazy">
            <blockquote class="blockquote mt-3">
              <p>"Very satisfied with the service and support."</p>
              <footer class="blockquote-footer">Ayesha Malik</footer>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Us -->
  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4 fw-bold">Contact Us</h2>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Your full name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Enter your message here..."></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary px-5">Send <i class="fas fa-paper-plane ms-1"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-4">
    <div class="container small">
      &copy; 2024 MyBrand. All rights reserved.
      <span class="mx-2">&middot;</span>
      <a href="#contact" class="footer-link">Contact us</a>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{asset('js/style.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/fontawesome.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
