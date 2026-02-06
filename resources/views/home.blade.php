@extends('layouts.app')

@section('title', 'Yudi Interior - Solusi Interior Modern')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Slider Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<section id="home" class="relative min-h-screen flex items-center overflow-hidden">
    
    <div id="slider-container" class="absolute inset-0 z-0">
        
        <div class="slider-image absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-100" 
             style="background-image: url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1920');">
        </div>
        
        <div class="slider-image absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" 
             style="background-image: url('https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1920&q=80');">
        </div>

        <div class="slider-image absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" 
             style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&q=80');">
        </div>

        <div class="slider-image absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" 
             style="background-image: url('https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1920&q=80');">
        </div>

    </div>
    
    <div class="absolute inset-0 bg-black opacity-60 z-10"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in-up z-20">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white">
            Wujudkan Rumah Impian Anda
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-gray-200">
            Desain interior modern dan elegan untuk menciptakan ruang yang sempurna sesuai kepribadian Anda
        </p>
        <a href="#contact" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-8 rounded-full transition transform hover:scale-105 shadow-lg">
            Konsultasi Gratis
        </a>
    </div>
</section>



</body>
</html>

<!-- Alert Messages -->
@if(session('success'))
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
            <span class="text-green-500 text-2xl">&times;</span>
        </button>
    </div>
</div>
@endif

@if(session('error'))
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
            <span class="text-red-500 text-2xl">&times;</span>
        </button>
    </div>
</div>
@endif

@if($errors->any())
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
            <span class="text-red-500 text-2xl">&times;</span>
        </button>
    </div>
</div>
@endif

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Title -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
            <p class="text-xl text-gray-600">Solusi lengkap untuk kebutuhan interior rumah Anda</p>
        </div>
        
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="text-6xl mb-4">{{ $service['icon'] }}</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $service['title'] }}</h3>
                <p class="text-gray-600">{{ $service['description'] }}</p>
            </div>
            @endforeach
        </div>
        
    </div>
</section>

<section id="portofolio" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Portofolio Kami</h2>
            <p class="text-xl text-gray-600">Lihat hasil karya terbaik kami</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portofolios as $portofolio)
            <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-2xl h-80 cursor-pointer transform transition-all duration-300 hover:-translate-y-2">
                
                <!-- Background Image -->
                <img src="{{ asset($portofolio['image']) }}" 
                     alt="{{ $portofolio['title'] }}" 
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-500">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-br {{ $portofolio['gradient'] }} opacity-30 group-hover:opacity-0 transition duration-300"></div>
                
                <!-- Title - Always Visible -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black via-black/70 to-transparent group-hover:opacity-0 transition duration-300">
                    <h3 class="text-2xl font-bold text-white mb-2">{{ $portofolio['title'] }}</h3>
                    <span class="inline-block bg-white bg-opacity-90 text-gray-800 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $portofolio['category'] }}
                    </span>
                </div>
                
                <!-- Hover Content -->
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-90 transition duration-300 flex items-center justify-center p-8">
                    <div class="text-white text-center opacity-0 group-hover:opacity-100 transition duration-500 transform translate-y-4 group-hover:translate-y-0">
                        <h3 class="text-3xl font-bold mb-3">{{ $portofolio['title'] }}</h3>
                        <p class="text-gray-200 mb-4 text-lg leading-relaxed">{{ $portofolio['description'] }}</p>
                        <span class="inline-block bg-white text-gray-800 px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            {{ $portofolio['category'] }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Title -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Testimoni Klien</h2>
            <p class="text-xl text-gray-600">Apa kata mereka tentang layanan kami</p>
        </div>
        
        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-lg shadow-lg p-8 relative transform transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer">
                <!-- Quote Icon -->
                <div class="text-6xl text-orange-500 opacity-20 absolute top-4 left-4 transition-opacity duration-300 group-hover:opacity-30">"</div>
                
                <!-- Testimonial Text -->
                <p class="text-gray-600 italic mb-6 relative z-10">{{ $testimonial['text'] }}</p>
                
                <!-- Rating -->
                <div class="flex mb-4">
                    @for($i = 0; $i < $testimonial['rating']; $i++)
                    <span class="text-yellow-400 text-xl transition-transform duration-200 hover:scale-125 inline-block">★</span>
                    @endfor
                </div>
                
                <!-- Author -->
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-4 transition-all duration-300 hover:bg-blue-600 hover:scale-110">
                        {{ $testimonial['avatar'] }}
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">{{ $testimonial['name'] }}</h4>
                        <p class="text-gray-600 text-sm">{{ $testimonial['position'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Title -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
            <p class="text-xl text-gray-600">Mari wujudkan interior impian Anda bersama kami</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Contact Info -->
            <div class="space-y-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                
                <!-- Address -->
                <div class="flex items-start">
                    <div class="text-3xl mr-4">📍</div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Alamat</h4>
                        <p class="text-gray-600">Jl. Candi Nggemplak 03/03 <br>BANGSRI,JEPARA 59453</p>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="flex items-start">
                    <div class="text-3xl mr-4">📞</div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Telepon</h4>
                        <p class="text-gray-600">+62 812-3456-7890</p>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="flex items-start">
                    <div class="text-3xl mr-4">📧</div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Email</h4>
                        <p class="text-gray-600">yudiinterior@gmail.com</p>
                    </div>
                </div>
                
                <!-- Hours -->
                <div class="flex items-start">
                    <div class="text-3xl mr-4">🕒</div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Jam Operasional</h4>
                        <p class="text-gray-600">Senin - Sabtu: 08.00 - 17.00<br>Minggu: Tutup</p>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    
                    <!-- Name -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama Anda"
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Phone -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Nomor Telepon</label>
                        <input 
                            type="tel" 
                            name="phone" 
                            value="{{ old('phone') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('phone') border-red-500 @enderror"
                            placeholder="08xx-xxxx-xxxx"
                        >
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Message -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Pesan</label>
                        <textarea 
                            name="message" 
                            rows="5"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('message') border-red-500 @enderror"
                            placeholder="Ceritakan tentang proyek interior Anda..."
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition"
                    >
                        Kirim Pesan
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Auto-hide alert messages after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('[role="alert"]');
        alerts.forEach(alert => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s ease';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
     document.addEventListener('DOMContentLoaded', function() {
        // 1. Ambil semua elemen gambar slider
        const slides = document.querySelectorAll('.slider-image');
        let currentSlide = 0;
        const slideInterval = 2000; // Ganti slide setiap 5000ms (5 detik)

        function nextSlide() {
            // Sembunyikan slide saat ini (ubah opacity jadi 0)
            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');

            // Hitung indeks slide berikutnya (kembali ke 0 jika sudah di akhir)
            currentSlide = (currentSlide + 1) % slides.length;

            // Tampilkan slide berikutnya (ubah opacity jadi 100)
            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
        }

        // Jalankan fungsi nextSlide setiap X detik
        setInterval(nextSlide, slideInterval);
    });
</script>
@endpush