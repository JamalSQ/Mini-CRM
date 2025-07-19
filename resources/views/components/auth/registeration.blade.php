<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Montserrat', Arial, sans-serif;
      background: linear-gradient(120deg, #e0e7ef 0%, #e0eafc 100%);
      min-height: 100vh;
    }
    .form-box {
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 2px 24px rgba(13, 110, 253, 0.09);
      padding: 2.5rem 2rem;
      max-width: 400px;
      margin: 2.5rem auto;
      transition: box-shadow 0.2s;
    }
    .form-box .form-label {
      font-weight: 600;
      color: #212529;
    }
    .form-box .form-control {
      border-radius: 18px;
      padding: 0.7rem 1.1rem;
    }
    .form-box .input-group-text {
      border-radius: 18px 0 0 18px;
      background: #f2f5fb;
      border-right: 0;
      color: #6c757d;
      font-size: 1.1rem;
    }
    .form-box .form-control:focus {
      box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.12);
    }
    .form-box .btn-primary {
      width: 100%;
      border-radius: 18px;
      font-weight: 600;
      font-size: 1.07rem;
      background: linear-gradient(90deg,#0d6efd 82%,#73b4fa 100%);
      box-shadow: 0 2px 14px rgba(13, 110, 253, 0.16);
      padding: 0.65rem;
      border: none;
    }
    .form-box .btn-primary:hover, .form-box .btn-primary:focus {
      background: linear-gradient(90deg,#1494ff 82%,#a9d2fa 100%);
    }
    .form-box .toggle-link {
      color: #0d6efd;
      cursor: pointer;
      font-weight: 500;
      text-decoration: underline;
    }
    .form-box .toggle-link:hover {
      color: #095bcc;
    }
    .logo-icon {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: #eef5ff;
      box-shadow: 0 1px 8px rgba(13,110,253,.09);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.7rem;
      color: #2d7fea;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <!-- Signup Form -->
    <div class="form-box mt-5">
      <div class="text-center">
      @if(session('success'))
        <div style="color: white; background-color:#0d6efd;border-radius:10px;">
            {{ session('success') }}
        </div>
      @endif
        <span class="logo-icon"><i class="fas fa-user-plus"></i></span>
        <h3 class="fw-bold mb-4">Sign Up</h3>
      </div>
      <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="signupName" class="form-label">First Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" name="firstName" id="signupName" placeholder="Your First name" required>
         @error('firstName')
            <span style="color: red;">{{ $message }}</span>
         @enderror
         </div>
        </div>
         <div class="mb-3">
          <label for="lastName" class="form-label">Last Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Your Last name" required>
         @error('lastName')
            <span style="color: red;">{{ $message }}</span>
         @enderror 
         </div>
        </div>
        <div class="mb-3">
          <label for="signupEmail" class="form-label">Email address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" id="signupEmail" placeholder="name@example.com" required>
         @error('email')
            <span style="color: red;">{{ $message }}</span>
         @enderror
         </div>
        </div>
        <div class="mb-3">
          <label for="signupPassword" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" name="password" id="signupPassword" placeholder="Choose a password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
        <div class="mt-3 text-center">
          <span class="text-muted">Already have an account? </span>
          <a href="{{route('login.form')}}" class="toggle-link">Login</a>
        </div>
      </form>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
