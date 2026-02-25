<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Meliana jati - Solusi furniture Modern')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Font Configuration */
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        body {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Navbar Scroll Effect */
        .navbar-scrolled {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Hero Background Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease;
        }

        /* Floating Animation for CTA Button */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #f97316, #ea580c);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #ea580c, #c2410c);
        }

        /* Mobile Menu Animation */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mobile-menu-open {
            animation: slideDown 0.3s ease;
        }

        /* Hover Effect for Service Cards */
        .service-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        /* Logo Pulse Effect */
        @keyframes pulse-subtle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .logo-icon:hover {
            animation: pulse-subtle 2s ease-in-out infinite;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50">

    <!-- Navigation -->
    <nav id="main-nav" class="bg-white shadow-lg fixed w-full top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">

                <!-- Logo Section -->
<div class="flex items-center">
    <a href="{{ route('home') }}" class="flex items-center group">
        <!-- Logo Image -->
        <div class="mr-3 transform transition-transform group-hover:scale-105">
            <img src="{{ asset('images/logo2.svg') }}"
                 alt="Yudi Interior Logo"
                 class="h-16 w-auto">

        </div>

        <!-- Text Logo (opsional - bisa dihapus jika logo sudah include text) -->
        <span class="text-2xl font-bold tracking-tight">
            <span class="text-gray-800">Meliana</span>
            <span class="text-orange-500">jati</span>
        </span>
    </a>
</div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-link px-4 py-2 text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200 rounded-lg hover:bg-orange-50">Beranda</a>
                    <a href="{{ route('services') }}" class="nav-link px-4 py-2 text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200 rounded-lg hover:bg-orange-50">Layanan</a>
                    <a href="{{ route('portfolio') }}" class="nav-link px-4 py-2 text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200 rounded-lg hover:bg-orange-50">Portofolio</a>
                    <a href="{{ route('home') }}#testimonials" class="nav-link px-4 py-2 text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200 rounded-lg hover:bg-orange-50">Testimoni</a>
                    <a href="{{ route('contact') }}" class="nav-link px-4 py-2 text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200 rounded-lg hover:bg-orange-50">Kontak</a>

                    @guest
                        <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-orange-500 font-medium">Masuk</a>
                    @else
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-gray-700 hover:text-orange-500 font-medium">Dashboard</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-gray-700 hover:text-orange-500 font-medium">Keluar</button>
                        </form>
                    @endguest

                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 rounded-lg p-2 hover:bg-gray-100 transition">
                        <svg id="hamburger-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg id="close-icon" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 mobile-menu-open">
            <div class="px-4 pt-2 pb-4 space-y-1 bg-white">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Beranda</a>
                <a href="{{ route('services') }}" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Layanan</a>
                <a href="{{ route('portfolio') }}" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Portofolio</a>
                <a href="{{ route('home') }}#testimonials" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Testimoni</a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Kontak</a>
                <a href="#contact" class="block mt-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white text-center font-semibold px-4 py-3 rounded-lg shadow-lg">
                    Konsultasi Gratis
                </a>
                @guest
                    <a href="{{ route('login') }}" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Masuk</a>
                @else
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium transition">Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="px-4 py-3">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-lg font-medium px-4 py-2">Keluar</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                <!-- About Section -->
                <div>
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">
                            <span class="text-white">Meliana</span>
                            <span class="text-orange-500">jati</span>
                        </h3>
                    </div>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        Kami menciptakan ruang yang indah dan elegan.
                    </p>

                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="#" class="group bg-gray-800 hover:bg-orange-500 p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/riikoo_prmnaa07?igsh=MWExeTA4Y3A1NXpzMw==" class="group bg-gray-800 hover:bg-orange-500 p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/6281234567890" class="group bg-gray-800 hover:bg-orange-500 p-3 rounded-lg transition-all duration-300 transform hover:scale-110">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>


                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-xl font-bold text-orange-500 mb-6">Layanan Kami</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#services" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Desain Rumah
                            </a>
                        </li>
                        <li>
                            <a href="#services" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Furniture Custom
                            </a>
                        </li>
                        <li>
                            <a href="#services" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Furniture Kantor
                            </a>
                        </li>
                        <li>
                            <a href="#services" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Konsultasi Desain
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-orange-500 mb-6">Link Cepat</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#home" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#portofolio" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Portofolio
                            </a>
                        </li>
                        <li>
                            <a href="#testimonials" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Testimoni
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-400 hover:text-orange-500 transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 text-orange-500 opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-bold text-orange-500 mb-6">Newsletter</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Dapatkan tips & inspirasi desain Furniture terbaru langsung ke email Anda</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-3">
                        @csrf
                        <div class="relative">
                            <input
                                type="email"
                                name="email"
                                placeholder="Masukkan email Anda"
                                required
                                class="w-full px-4 py-3 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 transition"
                            >
                        </div>
                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold px-4 py-3 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg"
                        >
                            Berlangganan Sekarang
                        </button>
                    </form>
                </div>

            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                    <p>&copy; {{ date('Y') }} Meliana jati. All Rights Reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-orange-500 transition">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-orange-500 transition">Syarat & Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/628895080227" target="_blank" class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-2xl z-50 transition-all duration-300 transform hover:scale-110 animate-float">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle with Animation
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('main-nav');
            if (window.scrollY > 50) {
                nav.classList.add('navbar-scrolled');
            } else {
                nav.classList.remove('navbar-scrolled');
            }
        });

        // Smooth scroll to sections
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80; // 80px offset untuk navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active Navigation Link
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-orange-500', 'bg-orange-50');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-orange-500', 'bg-orange-50');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
