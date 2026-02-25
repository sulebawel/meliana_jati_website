@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan dari ' . $contact->name)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Pesan Detail -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <a href="{{ route('admin.contacts.index') }}" class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                ← Kembali ke Pesan
            </a>
        </div>

        <!-- Info Pengirim -->
        <div class="border-b pb-6 mb-6">
            <h2 class="text-2xl font-bold text-gray-900">{{ $contact->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $contact->email }}</p>
            <p class="text-gray-600">{{ $contact->phone ?? 'Tidak ada nomor' }}</p>
            <p class="text-sm text-gray-500 mt-2">
                Dikirim: {{ $contact->created_at->format('d M Y - H:i') }}
            </p>
        </div>

        <!-- Isi Pesan -->
        <div class="mb-6">
            <h3 class="font-semibold text-gray-900 mb-3">Pesan:</h3>
            <div class="bg-gray-50 p-4 rounded-lg text-gray-700 whitespace-pre-wrap">
                {{ $contact->message }}
            </div>
        </div>

        <!-- Status Badge -->
        <div class="mb-6">
            @if($contact->status === 'unread')
                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Status: Belum Dibaca
                </span>
            @else
                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Status: Sudah Dibaca
                </span>
            @endif
        </div>
    </div>

    <!-- Sidebar Aksi -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow p-6 sticky top-24">
            <h3 class="font-semibold text-gray-900 mb-4">Aksi</h3>

            <a href="mailto:{{ $contact->email }}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-center transition font-medium mb-3">
                Balas Email
            </a>

            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="block w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition font-medium">
                    Hapus Pesan
                </button>
            </form>

            <!-- Info -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                <p class="text-sm text-blue-900">
                    <strong>Tips:</strong> Anda bisa langsung membalas email ke <strong>{{ $contact->email }}</strong>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
