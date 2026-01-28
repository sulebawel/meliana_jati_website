<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * MODEL: NewsletterSubscriber
 * 
 * Model untuk mengelola subscriber newsletter
 */

class NewsletterSubscriber extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'newsletter_subscribers';

    /**
     * Mass Assignment Protection
     * Kolom yang boleh diisi secara massal
     */
    protected $fillable = [
        'email',
        'is_active'
    ];

    /**
     * Cast Attributes
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * SCOPE: Get Active Subscribers
     * 
     * Cara pakai: NewsletterSubscriber::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * SCOPE: Get Inactive Subscribers
     * 
     * Cara pakai: NewsletterSubscriber::inactive()->get();
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Activate Subscription
     * 
     * Cara pakai: $subscriber->activate();
     */
    public function activate()
    {
        $this->is_active = true;
        $this->save();
    }

    /**
     * Deactivate Subscription
     * 
     * Cara pakai: $subscriber->deactivate();
     */
    public function deactivate()
    {
        $this->is_active = false;
        $this->save();
    }

    /**
     * Check if email already exists
     * 
     * Static method untuk cek apakah email sudah terdaftar
     * Cara pakai: NewsletterSubscriber::emailExists('test@example.com');
     */
    public static function emailExists($email)
    {
        return self::where('email', $email)->exists();
    }
}