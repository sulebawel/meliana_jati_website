@extends('layouts.admin')

@section('title', 'Manajemen Portofolio')
@section('page_title', 'Manajemen Portofolio')

@section('content')
<div class="space-y-6">
    <!-- Header dengan tombol tambah -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Total item portofolio: <span class="font-bold text-lg">{{ count($portofolios) }}</span></p>
        </div>
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition font-medium">
            + Tambah Portofolio
        </button>
    </div>

    <!-- Grid Portofolio -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($portofolios as $item)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <div class="relative h-48 overflow-hidden bg-gray-200">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900">{{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ $item['description'] ?? 'Tidak ada deskripsi' }}</p>
                    <div class="mt-4 flex space-x-2">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded transition text-sm font-medium">
                            Edit
                        </button>
                        <button class="flex-1 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded transition text-sm font-medium" onclick="return confirm('Hapus item ini?')">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-gray-50 border border-gray-200 rounded-lg p-12 text-center">
                <p class="text-gray-600 mb-4">Belum ada item portofolio</p>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition font-medium">
                    Tambah Item Pertama
                </button>
            </div>
        @endforelse
    </div>
</div>

<!-- Info -->
<div class="mt-12 bg-blue-50 border border-blue-200 rounded-lg p-6">
    <p class="text-blue-900">
        <strong>Catatan:</strong> Fitur edit dan delete untuk portofolio akan segera dikembangkan lebih lanjut. Saat ini Anda dapat mengelola portofolio melalui database atau backend.
    </p>
</div>
@endsection
