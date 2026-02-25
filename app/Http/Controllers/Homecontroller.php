<?php

namespace App\Http\Controllers;

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

        // Data untuk Portfolio Section
       $portofolios = [
    [
        'title' => 'Meja tarik 3M',
        'description' => 'Desain ruang tamu dengan konsep minimalis dan elegan yang cocok untuk keluarga',
        'category' => 'Perumahan',
        'gradient' => 'from-cyan-400 to-indigo-800',
        'image' => 'https://i.pinimg.com/736x/f3/7e/41/f37e41c85359b456b1e915f9db8875b4.jpg'
    ],
    [
        'title' => 'Meja piknik kotak',
        'description' => 'Desain ruang makan dengan konsep modern yang cocok untuk cafe',
        'category' => 'Perumahan',
        'gradient' => 'from-cyan-400 to-indigo-800',
        'image' => 'https://i.pinimg.com/736x/a5/30/09/a5300988a96b0d461377a3fa372692e5.jpg'
    ],
    [
        'title' => 'kursi lempit',
        'description' => 'Desain ruang kantor dengan konsep moderen dan nyaman',
        'category' => 'Perumahan',
        'gradient' => 'from-cyan-400 to-indigo-800',
        'image' => 'https://i.pinimg.com/1200x/3b/50/11/3b50113f31a1693e9fc4dec698dfae45.jpg'
    ],
    [
        'title' => 'Almari makan',
        'description' => 'desain furniture custom untuk ruang tamu dengan konsep minimalis dan elegan',
        'category' => 'Perumahan',
        'gradient' => 'from-cyan-400 to-indigo-800',
        'image' => 'https://i.pinimg.com/736x/f4/04/ed/f404ed0a384b307902e8bd5f64d55f39.jpg'
    ],
    [
        'title' => 'Meja makan',
        'description' => 'Desain ruang makan dengan konsep modern dan elegan yang cocok untuk keluarga',
        'category' => 'Perumahan',
        'gradient' => 'from-gray-400 to-indigo-800',
        'image' => 'https://i.pinimg.com/1200x/d8/ea/86/d8ea863baa2d59c5de03f775cf7e1138.jpg'
    ],
    [
        'title' => 'Kursi belajar',
        'description' => 'furnitur custom untuk ruang belajar anak dengan desain yang fun dan edukatif',
        'category' => 'Perumahan',
        'gradient' => 'from-cyan-400 to-indigo-800',
        'image' => 'https://i.pinimg.com/1200x/69/52/01/69520193fbc2c2f7be1128a7b0bc531f.jpg'
    ]
];
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
        $portofolios = [
            ['title' => 'Meja tarik 3M', 'image' => 'https://i.pinimg.com/736x/f3/7e/41/f37e41c85359b456b1e915f9db8875b4.jpg'],
            ['title' => 'Meja piknik', 'image' => 'https://i.pinimg.com/736x/a5/30/09/a5300988a96b0d461377a3fa372692e5.jpg'],
            ['title' => 'Kursi lempit', 'image' => 'https://i.pinimg.com/1200x/3b/50/11/3b50113f31a1693e9fc4dec698dfae45.jpg']
        ];

        return view('portfolio', compact('portofolios'));
    }

    /**
     * Show single portfolio item
     */
    public function showPortfolio($id)
    {
        $portofolios = [
            ['title' => 'Meja tarik 3M', 'image' => 'https://i.pinimg.com/736x/f3/7e/41/f37e41c85359b456b1e915f9db8875b4.jpg', 'description' => 'Desain ruang tamu dengan konsep minimalis dan elegan.'],
            ['title' => 'Meja piknik', 'image' => 'https://i.pinimg.com/736x/a5/30/09/a5300988a96b0d461377a3fa372692e5.jpg', 'description' => 'Desain meja santai dengan konsep modern.'],
            ['title' => 'Kursi lempit', 'image' => 'https://i.pinimg.com/1200x/3b/50/11/3b50113f31a1693e9fc4dec698dfae45.jpg', 'description' => 'Desain kursi yang fungsional dan nyaman.']
        ];

        $index = (int) $id;

        if (!isset($portofolios[$index])) {
            abort(404);
        }

        $item = $portofolios[$index];
        return view('portfolio-show', compact('item', 'index'));
    }

    /**
     * Contact page (GET)
     */
    public function contact()
    {
        return view('contact');
    }
}
