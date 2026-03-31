<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

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
                'title' => 'Furniture Rumahan',
                'description' => 'Desain furniture rumah yang nyaman dan fungsional sesuai kebutuhan keluarga Anda'
            ],
            [
                'icon' => '🛋️',
                'title' => 'Furniture Custom',
                'description' => 'Pembuatan furniture custom dengan kualitas terbaik dan desain eksklusif'
            ],
            [
                'icon' => '🏢',
                'title' => 'Furniture Ruangan',
                'description' => 'Ciptakan ruang kerja yang produktif dan inspiring untuk tim Anda'
            ],
        ];

        // Data untuk Portfolio Section - dari Database
        $portofolios = Portfolio::latest()->get()->map(function ($item) {
            return [
                'title' => $item->title,
                'description' => $item->description,
                'gradient' => 'from-cyan-400 to-indigo-800',
                'image' => $item->image ?? 'https://via.placeholder.com/400x300?text=Portfolio'
            ];
        })->toArray();

        // Data untuk Testimonials Section
        $testimonials = [
            [
                'name' => 'Budi',
                'position' => 'Pemilik barang, Jakarta',
                'avatar' => 'BP',
                'text' => 'Hasil kerja Meliana jati sangat memuaskan! Rumah kami jadi terlihat lebih modern dan nyaman. Tim sangat profesional dan memperhatikan detail.',
                'rating' => 5
            ],
            [
                'name' => 'Sekemkom',
                'position' => 'Pemilik Gudang, Semarang',
                'avatar' => 'SA',
                'text' => 'Proses pengerjaan cepat dan rapi. Hasilnya sesuai dengan keinginan kami bahkan melebihi ekspektasi. Sangat recommended!',
                'rating' => 5
            ],
            [
                'name' => 'agung wahyudi',
                'position' => 'Pemilik Kantor',
                'avatar' => 'RS',
                'text' => 'Desain kantor kami sekarang sangat modern dan membuat karyawan lebih produktif. Terima kasih Meliana jati!',
                'rating' => 5
            ]
        ];

        // Kirim data ke view
        return view('home', compact('services', 'portofolios', 'testimonials')); }

    /**
     * About page
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Services page
     */
    public function services()
    {
        $services = [
            ['icon' => '🏠', 'title' => 'Furniture Rumahan', 'description' => 'Desain furniture rumah yang nyaman dan fungsional.'],
            ['icon' => '🛋️', 'title' => 'Furniture Custom', 'description' => 'Pembuatan furniture custom dengan kualitas terbaik.'],
            ['icon' => '🏢', 'title' => 'Furniture Ruangan', 'description' => 'Solusi furniture untuk kantor dan ruang kerja.'],
        ];

        return view('services', compact('services'));
    }

    /**
     * Portfolio page
     */
    public function portfolio()
    {
        $portofolios = Portfolio::latest()->get();
        return view('portfolio', compact('portofolios'));
    }

    /**
     * Show single portfolio item
     */
    public function showPortfolio($id)
    {
        $item = Portfolio::findOrFail($id);
        return view('portfolio-show', compact('item'));
    }

    /**
     * Contact page (GET)
     */
    public function contact()
    {
        return view('contact');
    }
}
