@extends('layouts.app')

@section('title', 'Tentang Kami - Meliana Jati')

@section('content')

<section class="relative py-20 bg-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1920" alt="Workshop Background" class="w-full h-full object-cover">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-4">
            Tentang <span class="text-orange-500">Kami</span>
        </h1>
        <p class="text-gray-300 max-w-2xl mx-auto text-lg">Mengenal lebih dekat dedikasi Meliana Jati dalam menciptakan karya furniture berkualitas tinggi dari Jepara.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?w=800" alt="Furniture Production" class="rounded-2xl shadow-2xl relative z-10">
                <div class="absolute -bottom-6 -right-6 w-64 h-64 bg-orange-100 rounded-2xl -z-0"></div>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Dedikasi Untuk <span class="text-orange-500">Kualitas</span></h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Berawal dari kecintaan terhadap seni kayu khas Jepara, **Meliana Jati** hadir sebagai penyedia layanan interior dan furniture custom yang mengedepankan tiga pilar utama: **Estetika, Durabilitas, dan Fungsi**.
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
           class="bg-gray-900 text-white px-12 py-4 rounded-full font-bold hover:bg-black transition shadow-lg">
           Hubungi Kami Sekarang
        </a>
    </div>
</section>

@endsection
