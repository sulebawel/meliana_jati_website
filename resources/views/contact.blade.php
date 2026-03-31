@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<section id="contact" class="max-w-3xl mx-auto px-4 py-20">
    <h1 class="text-4xl font-bold mb-6">Kontak</h1>

    {{-- Menampilkan Pesan Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Menampilkan Pesan Error Validasi --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- INPUT PHONE YANG SEBELUMNYA HILANG --}}
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">No. Telepon</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Pesan</label>
            <textarea name="message" class="w-full border rounded px-3 py-2" rows="5" required>{{ old('message') }}</textarea>
        </div>
        <div>
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Kirim Pesan</button>
        </div>
    </form>
</section>
@endsection
