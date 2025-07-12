<!DOCTYPE html>
<html>
<head>
    <title>CAMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .home-wrapper {
            background: url("{{ asset('images/cams-bg.jpg') }}") no-repeat center center / cover;
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            height: 100%;
            width: 100%;
        }
    </style>
    <style>
        .navbar .nav-link {
            color: #333;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar .nav-link:hover {
            color: #fff;
            background-color: #0d6efd; 
            border-radius: 5px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .navbar .nav-item {
            margin-left: 10px;
        }
    </style>
    <style>
        .table thead th {
            background-color: #0d6efd !important;
            color: white !important;
        }
    </style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand text-primary" href="/"><b>CAMS</b></a>
       <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
                @if(auth()->user()->type === 'admin')
                    <li class="nav-item"><a href="{{ route('admin.client.list') }}" class="nav-link">Clients</a></li>
                    <li class="nav-item"><a href="{{ route('admin.client.add') }}" class="nav-link">New Client</a></li>
                    <li class="nav-item"><a href="{{ route('admin.assign') }}" class="nav-link">Client Assignment</a></li>
                @endif

                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>

    </nav>
    <div class="container mt-4">
        @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @yield('content')
    </div>
        <footer class="footer fixed-bottom bg-dark text-white text-center  shadow" style="margin-top:10px;">
            <div class="container">
                <small>&copy; {{ date('Y') }} CAMS. All rights reserved.</small>
            </div>
        </footer>
</body>
</html>
