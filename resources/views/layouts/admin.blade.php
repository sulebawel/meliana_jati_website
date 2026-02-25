<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard - Meliana jati')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        body {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
        }

        html {
            scroll-behavior: smooth;
        }

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

        .sidebar-active {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white flex flex-col fixed h-screen overflow-y-auto">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-800">
                <h2 class="text-xl font-bold">
                    <span class="text-white">Meliana</span>
                    <span class="text-orange-500">jati</span>
                </h2>
                <p class="text-xs text-gray-400 mt-1">Panel Admin</p>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"/>
                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zm8-4a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.contacts.index') }}" class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.contacts.*') ? 'sidebar-active' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    Pesan Masuk
                </a>

                <a href="{{ route('admin.portfolio') }}" class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.portfolio*') ? 'sidebar-active' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                    Portofolio
                </a>

                <a href="{{ route('admin.newsletter') }}" class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.newsletter') ? 'sidebar-active' : 'hover:bg-gray-800' }}">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 3a2 2 0 00-2 2v6h16V5a2 2 0 00-2-2H5z"/>
                        <path fill-rule="evenodd" d="M3 11a1 1 0 011 1v5a1 1 0 011 1H4a3 3 0 003 3h6a3 3 0 003-3h.005a1 1 0 01.992 1.1l-.982 5.708a2 2 0 01-1.968 1.67H5.982a2 2 0 01-1.968-1.67l-.982-5.708A1 1 0 015 15v-1a1 1 0 011-1h12a1 1 0 011 1v1a3 3 0 11-6 0v-1a1 1 0 011-1H7a1 1 0 00-1 1v5a1 1 0 001 1h6a1 1 0 001-1v-5a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Newsletter
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg transition text-sm font-medium">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="px-8 py-4 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('page_title', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-auto p-8">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
