@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Pesan -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-500">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Total Pesan</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalMessages ?? 0 }}</p>
            </div>
            <svg class="w-12 h-12 text-orange-100" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
        </div>
    </div>

    <!-- Pesan Belum Dibaca -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Belum Dibaca</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $unreadCount ?? 0 }}</p>
            </div>
            <svg class="w-12 h-12 text-red-100" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 11a1 1 0 11-2 0 1 1 0 012 0zM13 11a1 1 0 11-2 0 1 1 0 012 0zM9 11a1 1 0 11-2 0 1 1 0 012 0z"/>
            </svg>
        </div>
    </div>

    <!-- Total Subscriber -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Subscriber Newsletter</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSubscribers ?? 0 }}</p>
            </div>
            <svg class="w-12 h-12 text-blue-100" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 3a2 2 0 00-2 2v6h16V5a2 2 0 00-2-2H5z"/>
                <path fill-rule="evenodd" d="M3 11a1 1 0 011 1v5a1 1 0 001 1h12a1 1 0 001-1v-5a1 1 0 011 1v5a2 2 0 01-2 2H4a2 2 0 01-2-2v-5a1 1 0 011-1z" clip-rule="evenodd"/>
            </svg>
        </div>
    </div>

    <!-- Total Portofolio -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-600 text-sm font-medium">Item Portofolio</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalPortfolio ?? 0 }}</p>
            </div>
            <svg class="w-12 h-12 text-green-100" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
            </svg>
        </div>
    </div>
</div>

<!-- Quick Links -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Pesan Terbaru -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Pesan Terbaru</h3>
        @forelse($latestMessages ?? [] as $message)
            <div class="border-b pb-4 mb-4 last:border-b-0">
                <p class="font-semibold text-gray-900">{{ $message->name }}</p>
                <p class="text-sm text-gray-600">{{ Str::limit($message->message, 60) }}</p>
                <a href="{{ route('admin.contacts.show', $message->id) }}" class="text-sm text-orange-500 hover:text-orange-600 mt-2 inline-block">Lihat →</a>
            </div>
        @empty
            <p class="text-gray-500 text-sm">Belum ada pesan</p>
        @endforelse
    </div>

    <!-- Statistik Statis -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Ringkasan</h3>
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Status Pesan Dibaca:</span>
                <span class="font-semibold text-gray-900">{{ $readCount ?? 0 }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Total User:</span>
                <span class="font-semibold text-gray-900">{{ $totalUsers ?? 0 }}</span>
            </div>
            <div class="border-t pt-4 mt-4">
                <a href="{{ route('admin.contacts.index') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition font-medium">
                    Lihat Semua Pesan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
