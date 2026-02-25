@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')
<section id="portfolio" class="max-w-7xl mx-auto px-4 py-20">
    <h1 class="text-4xl font-bold mb-6">Portofolio</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($portofolios as $index => $item)
            <a href="{{ route('portfolio.show', $index) }}" class="block group" aria-label="Lihat detail {{ $item['title'] }}">
                <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover transform transition-transform duration-300 group-hover:scale-105 cursor-pointer">
                    <div class="p-4">
                        <h3 class="font-semibold">{{ $item['title'] }}</h3>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endsection
