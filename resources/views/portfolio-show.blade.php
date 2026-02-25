@extends('layouts.app')

@section('title', $item['title'] ?? 'Portofolio')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-20">
    <a href="{{ route('portfolio') }}" class="text-sm text-orange-500 mb-4 inline-block">&larr; Kembali ke Portofolio</a>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-72 object-cover">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-2">{{ $item['title'] }}</h1>
            @if(isset($item['description']))
                <p class="text-gray-700">{{ $item['description'] }}</p>
            @endif
        </div>
    </div>
</section>
@endsection
