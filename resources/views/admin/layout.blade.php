<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin') - FutureEngineers.pk</title>

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">

  <style>
    :root {
      --admin-bg: #f5f6fa;
      --admin-sidebar: #16213e;
      --admin-accent: #2f6fed;
    }
    body { background: var(--admin-bg); font-family: -apple-system, "Segoe UI", Roboto, Arial, sans-serif; }
    .admin-sidebar {
      background: var(--admin-sidebar);
      min-height: 100vh;
      color: #cfd3dc;
    }
    .admin-sidebar .brand {
      color: #fff;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 1.25rem 1.25rem 1rem;
      display: block;
      border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .admin-sidebar .brand span { color: var(--admin-accent); }
    .admin-sidebar .nav-link {
      color: #cfd3dc;
      padding: .6rem 1.25rem;
      border-radius: 0;
      font-size: .93rem;
    }
    .admin-sidebar .nav-link i { width: 20px; display: inline-block; }
    .admin-sidebar .nav-link.active,
    .admin-sidebar .nav-link:hover { background: rgba(255,255,255,.08); color: #fff; }
    .admin-topbar {
      background: #fff;
      border-bottom: 1px solid #e7e9ee;
      padding: .85rem 1.5rem;
    }
    .admin-content { padding: 1.5rem; }
    .admin-card {
      background: #fff;
      border: 1px solid #e7e9ee;
      border-radius: .6rem;
    }
    .stat-card { border-radius: .6rem; border: 1px solid #e7e9ee; background: #fff; padding: 1.1rem 1.25rem; }
    .stat-card .num { font-size: 1.8rem; font-weight: 700; color: #16213e; }
    .stat-card .label { color: #6c7280; font-size: .85rem; }
    .table thead th { font-size: .78rem; text-transform: uppercase; letter-spacing: .03em; color: #6c7280; border-bottom-width: 1px; }
    .btn-primary { background: var(--admin-accent); border-color: var(--admin-accent); }
    .btn-primary:hover { background: #2359c9; border-color: #2359c9; }
    textarea.details-list { font-family: inherit; }
    .field-hint { font-size: .8rem; color: #8a8f98; }
  </style>

  @stack('styles')
</head>
<body>

  <div class="d-flex">

    <!-- Sidebar -->
    <nav class="admin-sidebar flex-shrink-0" style="width: 230px;">
      <a href="{{ route('admin.dashboard') }}" class="brand">Future<span>Engineers</span>.pk<br><small style="font-weight:400; font-size:.7rem; opacity:.7;">Admin Panel</small></a>
      <div class="nav flex-column py-2">
        <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid-1x2"></i> Dashboard</a>
        <a class="nav-link @if(request()->routeIs('admin.listings.*') && request()->route('section') === 'jobs') active @endif" href="{{ route('admin.listings.index', 'jobs') }}"><i class="bi bi-briefcase"></i> Jobs & Internships</a>
        <a class="nav-link @if(request()->routeIs('admin.listings.*') && request()->route('section') === 'scholarships') active @endif" href="{{ route('admin.listings.index', 'scholarships') }}"><i class="bi bi-mortarboard"></i> Scholarships</a>
        <a class="nav-link @if(request()->routeIs('admin.listings.*') && request()->route('section') === 'courses') active @endif" href="{{ route('admin.listings.index', 'courses') }}"><i class="bi bi-journal-bookmark"></i> Courses</a>
        <a class="nav-link @if(request()->routeIs('admin.cv-templates.*')) active @endif" href="{{ route('admin.cv-templates.index') }}"><i class="bi bi-file-earmark-text"></i> CV Templates</a>
        <a class="nav-link @if(request()->routeIs('admin.articles.*')) active @endif" href="{{ route('admin.articles.index') }}"><i class="bi bi-newspaper"></i> Industry News</a>
        <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}"><i class="bi bi-tags"></i> Categories</a>
        <a class="nav-link @if(request()->routeIs('admin.contact-messages.*')) active @endif" href="{{ route('admin.contact-messages.index') }}"><i class="bi bi-envelope"></i> Contact Messages</a>
        <hr class="my-2" style="border-color: rgba(255,255,255,.08);">
        <a class="nav-link" href="{{ url('/') }}" target="_blank"><i class="bi bi-box-arrow-up-right"></i> View Live Site</a>
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start"><i class="bi bi-box-arrow-left"></i> Log Out</button>
        </form>
      </div>
    </nav>

    <!-- Main -->
    <div class="flex-grow-1" style="min-width: 0;">
      <div class="admin-topbar d-flex justify-content-between align-items-center">
        <h1 class="h5 mb-0">@yield('title', 'Dashboard')</h1>
        <span class="text-muted small">{{ auth()->user()->name ?? '' }}</span>
      </div>

      <div class="admin-content">

        @if(session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @yield('content')

      </div>
    </div>

  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
