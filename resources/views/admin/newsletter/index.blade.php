@extends('layouts.admin')

@section('title', 'Newsletter Subscriber')
@section('page_title', 'Manajemen Newsletter')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Total subscriber: <span class="font-bold text-lg">{{ $subscribers->total() }}</span></p>
        </div>
        <a href="{{ route('admin.newsletter.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition font-medium">
            + Tambah Subscriber
        </a>
    </div>

    <!-- Tabel Subscriber -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tanggal Didaftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($subscribers as $sub)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $sub->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($sub->is_active)
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $sub->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                <a href="{{ route('admin.newsletter.edit', $sub->id) }}" class="text-blue-600 hover:text-blue-900 transition">
                                    Edit
                                </a>
                                <span class="text-gray-300 mx-2">|</span>
                                <form action="{{ route('admin.newsletter.destroy', $sub->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus subscriber ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                Belum ada subscriber
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $subscribers->links() }}
    </div>
</div>

<!-- Info -->
<div class="mt-12 bg-purple-50 border border-purple-200 rounded-lg p-6">
    <h3 class="font-semibold text-purple-900 mb-2">📧 Fitur Newsletter</h3>
    <p class="text-purple-900">
        Anda dapat mengelola subscriber newsletter dari halaman ini. Tambahkan subscriber baru, edit informasi mereka, atau hapus subscriber yang sudah tidak aktif.
    </p>
</div>
@endsection
