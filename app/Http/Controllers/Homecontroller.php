<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * CONTROLLER: HomeController
 * 
 * Controller ini handle halaman utama website
 * Menampilkan hero section, services, portfolio, testimonials, dan contact form
 */

class HomeController extends Controller
{
    /**
     * Display Homepage
     * 
     * Method ini menampilkan halaman utama
     * Route: GET /
     */
    public function index()
    {
        // Data untuk Services Section
        $services = [
            [
                'icon' => '🏠',
                'title' => 'Interior Rumah',
                'description' => 'Desain interior rumah yang nyaman dan fungsional sesuai kebutuhan keluarga Anda'
            ],
            [
                'icon' => '🛋️',
                'title' => 'Furniture Custom',
                'description' => 'Pembuatan furniture custom dengan kualitas terbaik dan desain eksklusif'
            ],
            [
                'icon' => '🏢',
                'title' => 'Interior Kantor',
                'description' => 'Ciptakan ruang kerja yang produktif dan inspiring untuk tim Anda'
            ],
        ];

        // Data untuk Portfolio Section
       $portofolios = [
    [
        'title' => 'Rumah Modern Minimalis',
        'description' => 'Desain minimalis dengan sentuhan modern untuk rumah keluarga',
        'category' => 'Perumahan',  
        'gradient' => 'from-purple-400 to-purple-600',
        'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800'
    ],
    [
        'title' => 'Apartemen Pribadi',
        'description' => 'Interior apartemen dengan konsep scandinavian yang hangat dan nyaman',
        'category' => 'Perumahan',
        'gradient' => 'from-pink-400 to-red-500',
        'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800'
    ],
    [
        'title' => 'Kantor',
        'description' => 'Desain kantor modern dengan konsep industrial',
        'category' => 'Komersial',
        'gradient' => 'from-blue-400 to-cyan-500',
        'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800'
    ],
    [
        'title' => 'Villa Pribadi',
        'description' => 'Interior villa dengan nuansa tropis yang menyegarkan',
        'category' => 'Perumahan',
        'gradient' => 'from-green-400 to-teal-500',
        'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800'
    ],
    [
        'title' => 'Kafe Modern',
        'description' => 'Desain kafe dengan konsep contemporary yang instagramable',
        'category' => 'Komersial',
        'gradient' => 'from-pink-500 to-yellow-400',
        'image' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=800'
    ],
    [
        'title' => 'Dapur Interior',
        'description' => 'Interior mewah untuk dapur modern anda',
        'category' => 'Perumahan',
        'gradient' => 'from-cyan-400 to-indigo-800',
        'image' => 'https://images.unsplash.com/photo-1632583824020-937ae9564495?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8a2l0Y2hlbiUyMGRlc2lnbnxlbnwwfHwwfHx8MA%3D%3D'
    ]
];
        // Data untuk Testimonials Section
        $testimonials = [
            [
                'name' => 'Budi Prasetyo',
                'position' => 'Pemilik Rumah, Jakarta',
                'avatar' => 'BP',
                'text' => 'Hasil kerja Yudi Interior sangat memuaskan! Rumah kami jadi terlihat lebih modern dan nyaman. Tim sangat profesional dan memperhatikan detail.',
                'rating' => 5
            ],
            [
                'name' => 'Siti Aminah',
                'position' => 'Pemilik Hotel, Bandung',
                'avatar' => 'SA',
                'text' => 'Proses pengerjaan cepat dan rapi. Hasilnya sesuai dengan keinginan kami bahkan melebihi ekspektasi. Sangat recommended!',
                'rating' => 5
            ],
            [
                'name' => 'Riko Permana Saputra',
                'position' => 'Pemilik Kantor, Jakarta',
                'avatar' => 'RS',
                'text' => 'Desain kantor kami sekarang sangat modern dan membuat karyawan lebih produktif. Terima kasih Yudi Interior!',
                'rating' => 5
            ]
        ];

        // Kirim data ke view
        return view('home', compact('services', 'portofolios', 'testimonials'));
    }
}