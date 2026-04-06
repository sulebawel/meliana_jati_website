<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meliana Jati')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body class="bg-gray-50 font-sans antialiased">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Meliana Jati Logo" class="h-12 w-12">
                    <div class="text-2xl font-bold text-orange-600">Meliana Jati</div>
                </div>
                <div
                    class="hidden md:flex items-center space-x-8 text-sm font-bold uppercase tracking-widest text-gray-600">

                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-orange-500' : 'hover:text-orange-500' }} transition">Home</a>

                    

                    <a href="{{ route('portfolio') }}"
                        class="{{ request()->routeIs('portfolio') ? 'text-orange-500' : 'hover:text-orange-500' }} transition">Produk</a>

                    <a href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'text-orange-500' : 'hover:text-orange-500' }} transition">Kontak</a>





                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-10 text-center">
        <p>&copy; {{ date('Y') }} Meliana Jati. All Rights Reserved.</p>
    </footer>

    @stack('scripts')
</body>

</html>
