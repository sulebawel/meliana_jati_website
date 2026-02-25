@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<section id="services" class="max-w-7xl mx-auto px-4 py-20">
    <h1 class="text-4xl font-bold mb-6">Layanan Kami</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($services as $service)
            <div class="bg-white p-6 rounded-lg shadow service-card">
                <div class="text-3xl mb-4">{{ $service['icon'] }}</div>
                <h3 class="text-xl font-semibold mb-2">{{ $service['title'] }}</h3>
                <p class="text-gray-600">{{ $service['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
