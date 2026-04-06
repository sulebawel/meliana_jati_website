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

    <section id="tentang-kami" class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?w=800" alt="Furniture Production" class="rounded-2xl shadow-2xl relative z-10">
                    <div class="absolute -bottom-6 -right-6 w-64 h-64 bg-orange-100 rounded-2xl -z-0"></div>
                </div>
                <div>
                    <span class="text-orange-500 font-bold tracking-wider uppercase text-sm">Tentang Kami</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-6">Dedikasi Untuk <span class="text-orange-500">Kualitas</span></h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Berawal dari kecintaan terhadap seni kayu khas Jepara, <strong>Meliana Jati</strong> hadir sebagai penyedia layanan interior dan furniture custom yang mengedepankan tiga pilar utama: <strong>Estetika, Durabilitas, dan Fungsi</strong>.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Kami memahami bahwa setiap ruangan memiliki cerita unik. Oleh karena itu, kami tidak hanya menjual produk, tetapi membantu Anda merancang furnitur yang sesuai dengan kepribadian dan kebutuhan ruang impian Anda.
                    </p>
                    <div class="mt-8 grid grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-2xl font-bold text-orange-500">10+</h4>
                            <p class="text-sm text-gray-500 font-semibold uppercase">Tahun Pengalaman</p>
                        </div>
                        <div>
                            <h4 class="text-2xl font-bold text-orange-500">500+</h4>
                            <p class="text-sm text-gray-500 font-semibold uppercase">Proyek Selesai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Mengapa Memilih Meliana Jati?</h2>
                <div class="h-1 w-20 bg-orange-500 mx-auto mt-4 rounded"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition border-t-4 border-orange-500">
                    <div class="text-orange-500 text-4xl mb-4"><i class="fas fa-tree"></i></div>
                    <h3 class="text-xl font-bold mb-3">Kayu Jati Pilihan</h3>
                    <p class="text-gray-600 text-sm">Kami hanya menggunakan kayu jati berkualitas dari sumber legal yang dikeringkan sempurna untuk mencegah retak.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition border-t-4 border-gray-800">
                    <div class="text-gray-800 text-4xl mb-4"><i class="fas fa-hammer"></i></div>
                    <h3 class="text-xl font-bold mb-3">Pengrajin Berbakat</h3>
                    <p class="text-gray-600 text-sm">Dikerjakan langsung oleh tangan-tangan ahli dari Jepara yang telah berpengalaman lintas generasi.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition border-t-4 border-orange-500">
                    <div class="text-orange-500 text-4xl mb-4"><i class="fas fa-pencil-ruler"></i></div>
                    <h3 class="text-xl font-bold mb-3">Desain Sesuai Request</h3>
                    <p class="text-gray-600 text-sm">Anda bebas menentukan ukuran, warna finishing, hingga model sesuai dengan konsep interior Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 bg-orange-500 rounded-3xl p-10 md:p-16 text-center text-white shadow-2xl">
            <h2 class="text-3xl font-bold mb-6">Siap Mewujudkan Ruang Impian?</h2>
            <p class="text-orange-100 mb-8 text-lg">Konsultasikan kebutuhan furniture Anda secara gratis dengan admin ahli kami.</p>
            <a href="https://api.whatsapp.com/send/?phone=6289531749792&text={{ urlencode('Halo Meliana Jati, saya ingin berkonsultasi mengenai furniture kustom. Bisa dibantu?') }}"
               target="_blank"
               class="bg-gray-900 text-white px-12 py-4 rounded-full font-bold hover:bg-black transition shadow-lg inline-block">
               Hubungi Kami Sekarang
            </a>
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
