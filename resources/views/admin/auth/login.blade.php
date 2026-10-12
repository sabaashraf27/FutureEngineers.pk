<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login - FutureEngineers.pk</title>
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    body { background: #16213e; min-height: 100vh; display: flex; align-items: center; font-family: -apple-system, "Segoe UI", Roboto, Arial, sans-serif; }
    .login-card { max-width: 380px; margin: auto; background: #fff; border-radius: .75rem; padding: 2.25rem; }
    .login-card h1 { font-size: 1.3rem; font-weight: 700; }
    .login-card .brand-accent { color: #2f6fed; }
    .btn-primary { background: #2f6fed; border-color: #2f6fed; }
    .btn-primary:hover { background: #2359c9; border-color: #2359c9; }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-card">
      <h1 class="mb-1">Future<span class="brand-accent">Engineers</span>.pk</h1>
      <p class="text-muted mb-4">Admin sign in</p>

      @if($errors->any())
        <div class="alert alert-danger py-2">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.login.attempt') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" name="remember" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">Keep me signed in</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Sign In</button>
      </form>
    </div>
  </div>
</body>
</html>
