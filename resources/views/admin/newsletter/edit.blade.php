@extends('layouts.admin')

@section('title', 'Edit Subscriber')
@section('page_title', 'Edit Subscriber')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <form action="{{ route('admin.newsletter.update', $subscriber->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $subscriber->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 @error('email') border-red-500 @enderror"
                        placeholder="Masukkan email subscriber"
                        required
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $subscriber->is_active) ? 'checked' : '' }}
                            class="w-5 h-5 text-orange-500 rounded focus:ring-orange-500"
                        >
                        <label class="ml-3 text-sm text-gray-600">
                            Aktif (subscriber akan menerima email)
                        </label>
                    </div>
                </div>

                <!-- Registered Date -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600">
                        <strong>Terdaftar:</strong> {{ $subscriber->created_at->format('d M Y H:i') }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex space-x-4 pt-4">
                    <button
                        type="submit"
                        class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded-lg transition"
                    >
                        Simpan Perubahan
                    </button>
                    <a
                        href="{{ route('admin.newsletter') }}"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg transition text-center"
                    >
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
