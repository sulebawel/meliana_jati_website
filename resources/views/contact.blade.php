@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<section id="contact" class="max-w-3xl mx-auto px-4 py-20">
    <h1 class="text-4xl font-bold mb-6">Kontak</h1>

    <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Pesan</label>
            <textarea name="message" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
        </div>
        <div>
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Kirim Pesan</button>
        </div>
    </form>
</section>
@endsection
