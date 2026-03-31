@extends('layouts.app')

@section('content')
    <section id="home" class="relative min-h-screen flex items-center overflow-hidden">
        <div id="slider-container" class="absolute inset-0 z-0">
            <div class="slider-image absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100"
                style="background-image: url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1920');"></div>
            <div class="slider-image absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0"
                style="background-image: url('https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=1920&q=80');">
            </div>
        </div>
        <div class="absolute inset-0 bg-black/40 z-10"></div>

        <div class="relative max-w-7xl mx-auto px-4 text-center z-20">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6">Sentuhan <span class="text-orange-500">Kayu
                    Jati</span> Berkelas</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto">Kami menghadirkan kehangatan alam ke dalam
                rumah Anda dengan desain furniture kustom terbaik.</p>

            <a href="https://api.whatsapp.com/send/?phone=6289531749792&text=Halo%20Meliana%20Jati%2C%20saya%20ingin%20berkonsultasi%20mengenai%20furniture%20kustom.%20Bisa%20dibantu%3F"
                class="bg-orange-500 text-white px-10 py-4 rounded-full font-bold hover:bg-orange-600 transition shadow-xl">Konsultasi
                Sekarang</a>

        </div>
    </section>

    <section id="portofolio" class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Koleksi Portofolio</h2>
                <p class="text-gray-500">Hasil pengerjaan interior dan furniture kustom kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($portofolios as $item)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition group">
                        <div class="h-64 overflow-hidden">
                            {{-- FIX ERROR: Menggunakan array akses [] sesuai error log anda --}}
                            <img src="{{ asset($item['image'] ?? 'default.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-6">
                            <span
                                class="text-orange-500 text-xs font-bold uppercase">{{ $item['category'] ?? 'Furniture' }}</span>
                            <h3 class="text-xl font-bold text-gray-800 mt-1">{{ $item['title'] ?? 'Untitled' }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ $item['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Slider JS
        const slides = document.querySelectorAll('.slider-image');
        let current = 0;
        setInterval(() => {
            slides[current].classList.replace('opacity-100', 'opacity-0');
            current = (current + 1) % slides.length;
            slides[current].classList.replace('opacity-0', 'opacity-100');
        }, 4000);
    </script>
@endpush
