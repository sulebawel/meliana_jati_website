<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

/**
 * CONTROLLER: ContactController
 *
 * Controller ini handle form kontak dan newsletter
 */

class ContactController extends Controller
{
    /**
     * Store Contact Form Submission
     *
     * Method ini menerima data dari form kontak dan menyimpannya ke database
     * Route: POST /contact
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // LANGKAH 1: Validasi Input
        // Laravel akan otomatis check apakah data sesuai rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000'
        ], [
            // Custom error messages (dalam Bahasa Indonesia)
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 100 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'Nomor telepon harus diisi',
            'message.required' => 'Pesan harus diisi',
            'message.max' => 'Pesan maksimal 1000 karakter'
        ]);

        // Jika validasi gagal, redirect kembali dengan error
        if ($validator->fails()) {
            return redirect('/#contact')
                ->withErrors($validator)
                ->withInput();
        }

        // LANGKAH 2: Simpan ke Database
        try {
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'status' => 'unread'
            ]);



            // LANGKAH 4: Redirect dengan pesan sukses
            return redirect('/#contact')
                ->with('success', 'Terima kasih! Pesan Anda telah dikirim. Kami akan segera menghubungi Anda.');

        } catch (\Exception $e) {
            // Jika ada error, redirect dengan pesan error
            return redirect('/#contact')
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Subscribe to Newsletter
     *
     * Method ini handle pendaftaran newsletter
     * Route: POST /newsletter
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function newsletter(Request $request)
    {
        // Validasi email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100|unique:newsletter_subscribers,email'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar di newsletter kami'
        ]);

        if ($validator->fails()) {
            return redirect('/#contact')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Simpan email ke database
            \App\Models\NewsletterSubscriber::create([
                'email' => $request->email,
                'is_active' => true
            ]);

            // Kirim welcome email (optional)
            /*
            Mail::to($request->email)->send(
                new NewsletterWelcome()
            );
            */

            return redirect('/#contact')
                ->with('success', 'Terima kasih telah berlangganan newsletter kami!');

        } catch (\Exception $e) {
            return redirect('/#contact')
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Display All Contacts (Admin)
     *
     * Method ini untuk menampilkan semua pesan kontak (untuk admin panel)
     * Route: GET /admin/contacts
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Protect admin route
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        // Ambil semua kontak, urutkan dari yang terbaru
        $contacts = Contact::latestFirst()->paginate(20);

        // Hitung jumlah pesan yang belum dibaca
        $unreadCount = Contact::unread()->count();

        return view('admin.contacts.index', compact('contacts', 'unreadCount'));
    }

    /**
     * Show Single Contact (Admin)
     *
     * Method ini untuk menampilkan detail satu pesan
     * Route: GET /admin/contacts/{id}
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Protect admin route
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $contact = Contact::findOrFail($id);

        // Mark as read saat dibuka
        if ($contact->status === 'unread') {
            $contact->markAsRead();
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Create Contact Form (Admin)
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        return view('admin.contacts.create');
    }

    /**
     * Store Contact (Admin)
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeAdmin(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
            'status' => 'required|in:read,unread'
        ]);

        Contact::create($validated);

        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil ditambahkan');
    }

    /**
     * Edit Contact Form (Admin)
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update Contact (Admin)
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
            'status' => 'required|in:read,unread'
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil diperbarui');
    }

    /**
     * Delete Contact (Admin)
     *
     * Method ini untuk menghapus pesan
     * Route: DELETE /admin/contacts/{id}
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Protect admin route
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('admin.contacts.index')
                ->with('success', 'Pesan berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->route('admin.contacts.index')
                ->with('error', 'Gagal menghapus pesan');
        }
    }
}
