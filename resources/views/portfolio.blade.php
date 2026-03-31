@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')
<section id="portfolio" class="max-w-7xl mx-auto px-4 py-20">
    <h1 class="text-4xl font-bold mb-6">Portofolio</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($portofolios as $item)
            <a href="{{ route('portfolio.show', $item->id) }}" class="block group" aria-label="Lihat detail {{ $item->title }}">
                <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105 cursor-pointer">
                    <div class="p-4">
                        <h3 class="font-semibold">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-600 mt-2">{{ Str::limit($item->description, 80) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full bg-gray-100 text-center py-20 rounded-lg">
                <p class="text-gray-600 text-lg">Belum ada portofolio. Silakan kembali lagi nanti.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
