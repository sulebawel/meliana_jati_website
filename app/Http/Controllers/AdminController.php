<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Portfolio;
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
        $totalPortfolio = Portfolio::count();
        $latestMessages = Contact::latestFirst()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalMessages', 'unreadCount', 'readCount',
            'totalSubscribers', 'totalUsers', 'latestMessages',
            'totalPortfolio'
        ));
    }

    // ============= PORTFOLIO MANAGEMENT =============

    /**
     * Portfolio Index
     */
    public function portfolioIndex()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $portofolios = Portfolio::latest()->paginate(12);
        return view('admin.portfolio.index', compact('portofolios'));
    }

    /**
     * Portfolio Create Form
     */
    public function portfolioCreate()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        return view('admin.portfolio.create');
    }

    /**
     * Portfolio Store
     */
    public function portfolioStore(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url'
        ]);

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil ditambahkan');
    }

    /**
     * Portfolio Edit Form
     */
    public function portfolioEdit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Portfolio Update
     */
    public function portfolioUpdate(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url'
        ]);

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil diperbarui');
    }

    /**
     * Portfolio Destroy
     */
    public function portfolioDestroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil dihapus');
    }

    // ============= NEWSLETTER MANAGEMENT =============

    /**
     * Newsletter Index
     */
    public function newsletterIndex()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $subscribers = NewsletterSubscriber::latest()->paginate(20);
        return view('admin.newsletter.index', compact('subscribers'));
    }

    /**
     * Newsletter Create Form
     */
    public function newsletterCreate()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        return view('admin.newsletter.create');
    }

    /**
     * Newsletter Store
     */
    public function newsletterStore(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');
        NewsletterSubscriber::create($validated);

        return redirect()->route('admin.newsletter')->with('success', 'Subscriber berhasil ditambahkan');
    }

    /**
     * Newsletter Edit Form
     */
    public function newsletterEdit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $subscriber = NewsletterSubscriber::findOrFail($id);
        return view('admin.newsletter.edit', compact('subscriber'));
    }

    /**
     * Newsletter Update
     */
    public function newsletterUpdate(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $subscriber = NewsletterSubscriber::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email,' . $id,
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');
        $subscriber->update($validated);

        return redirect()->route('admin.newsletter')->with('success', 'Subscriber berhasil diperbarui');
    }

    /**
     * Newsletter Destroy
     */
    public function newsletterDestroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $subscriber = NewsletterSubscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.newsletter')->with('success', 'Subscriber berhasil dihapus');
    }
}
