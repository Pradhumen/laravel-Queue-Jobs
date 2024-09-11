<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Application')</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Add any additional CSS files if necessary -->
   
</head>
<body>
    <header>
        <nav>
            <!-- Navigation Links -->
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li><a href="{{ route('newsletter.create') }}">Create Newsletter</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer Content -->
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </footer>

    <!-- Add your JavaScript links here -->
 
    <!-- Add any additional JS files if necessary -->
    @stack('scripts')
</body>
</html>
