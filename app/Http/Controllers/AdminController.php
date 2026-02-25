<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
        // Proteksi
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        // Data untuk dashboard
        $totalMessages = Contact::count();
        $unreadCount = Contact::unread()->count();
        $readCount = Contact::read()->count();
        $totalSubscribers = NewsletterSubscriber::count();
        $totalUsers = User::count();
        $latestMessages = Contact::latestFirst()->limit(5)->get();

        // Data portofolio (dari HomeController)
        $portofolios = [
            ['title' => 'Meja tarik 3M', 'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800'],
            ['title' => 'Meja piknik', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800'],
            ['title' => 'Kursi lempit', 'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800']
        ];
        $totalPortfolio = count($portofolios);

        return view('admin.dashboard', compact(
            'totalMessages', 'unreadCount', 'readCount',
            'totalSubscribers', 'totalUsers', 'latestMessages',
            'totalPortfolio'
        ));
    }

    /**
     * Admin Portfolio Index
     */
    public function portfolioIndex()
    {
        // Proteksi
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $portofolios = [
            ['id' => 0, 'title' => 'Meja tarik 3M', 'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800', 'description' => 'Desain ruang tamu minimalis'],
            ['id' => 1, 'title' => 'Meja piknik', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800', 'description' => 'Desain ruang makan modern'],
            ['id' => 2, 'title' => 'Kursi lempit', 'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800', 'description' => 'Kursi fungsional nyaman']
        ];

        return view('admin.portfolio.index', compact('portofolios'));
    }

    /**
     * Admin Newsletter Index
     */
    public function newsletterIndex()
    {
        // Proteksi
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $subscribers = NewsletterSubscriber::latest()->paginate(20);

        return view('admin.newsletter.index', compact('subscribers'));
    }
}
