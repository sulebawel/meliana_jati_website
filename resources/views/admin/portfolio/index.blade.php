@extends('layouts.admin')

@section('title', 'Manajemen Portofolio')
@section('page_title', 'Manajemen Portofolio')

@section('content')
<div class="space-y-6">
    <!-- Header dengan tombol tambah -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Total item portofolio: <span class="font-bold text-lg">{{ $portofolios->total() }}</span></p>
        </div>
        <a href="{{ route('admin.portfolio.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition font-medium">
            + Tambah Portofolio
        </a>
    </div>

    <!-- Grid Portofolio -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($portofolios as $item)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <div class="relative h-48 overflow-hidden bg-gray-200">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ Str::limit($item->description, 100) ?? 'Tidak ada deskripsi' }}</p>
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('admin.portfolio.edit', $item->id) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded transition text-sm font-medium text-center">
                            Edit
                        </a>
                        <form action="{{ route('admin.portfolio.destroy', $item->id) }}" method="POST" style="flex: 1" onsubmit="return confirm('Hapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded transition text-sm font-medium">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-gray-50 border border-gray-200 rounded-lg p-12 text-center">
                <p class="text-gray-600 mb-4">Belum ada item portofolio</p>
                <a href="{{ route('admin.portfolio.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition font-medium">
                    Tambah Item Pertama
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        {{ $portofolios->links() }}
    </div>
</div>
@endsection
