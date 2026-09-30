<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SHOTSPACE - Fans')</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            background-color: #f0f4f9;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e3e6f0;
        }
        .navbar-brand {
            font-weight: 800;
            color: #2b56f5 !important;
            letter-spacing: 0.5px;
        }
        .nav-link {
            font-weight: 600;
            color: #6e7889 !important;
            font-size: 0.95rem;
        }
        .nav-link.active, .nav-link:hover {
            color: #2b56f5 !important;
        }
        .card-event {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 12px;
            border: none;
        }
        .card-event:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08) !important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="{{ route('fans.index') }}">SHOTSPACE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('fans.index') ? 'active' : '' }} mr-3" href="{{ route('fans.index') }}">Daftar Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('fans.tentang') ? 'active' : '' }} mr-3" href="{{ route('fans.tentang') }}">Tentang LNGSHOT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('fans.kontak') ? 'active' : '' }}" href="{{ route('fans.kontak') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="text-center py-4 text-muted small">
        Copyright &copy; ShotSpace {{ date('Y') }}
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>