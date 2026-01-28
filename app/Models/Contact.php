<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MODEL: Contact
 * 
 * Model ini merepresentasikan tabel 'contacts' di database
 * Digunakan untuk CRUD (Create, Read, Update, Delete) data kontak
 */

class Contact extends Model
{
    use HasFactory;

   
    protected $table = 'contacts';

    /**
     * Mass Assignment Protection
     * 
     * $fillable mendefinisikan kolom mana saja yang boleh diisi secara massal
     * Ini untuk keamanan, mencegah mass assignment vulnerability
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status'
    ];

    /**
     * Cast Attributes
     * 
     * Mengubah tipe data kolom saat di-retrieve dari database
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * SCOPE: Get Unread Messages
     * 
     * Cara pakai: Contact::unread()->get();
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    /**
     * SCOPE: Get Read Messages
     * 
     * Cara pakai: Contact::read()->get();
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    /**
     * SCOPE: Latest First
     * 
     * Cara pakai: Contact::latest()->get();
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Mark as Read
     * 
     * Method untuk menandai pesan sebagai sudah dibaca
     * Cara pakai: $contact->markAsRead();
     */
    public function markAsRead()
    {
        $this->status = 'read';
        $this->save();
    }

    /**
     * Mark as Unread
     * 
     * Method untuk menandai pesan sebagai belum dibaca
     * Cara pakai: $contact->markAsUnread();
     */
    public function markAsUnread()
    {
        $this->status = 'unread';
        $this->save();
    }
}