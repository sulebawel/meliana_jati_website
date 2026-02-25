<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $table = 'newsletter_subscribers';

    /**
     * Mass Assignment Protection
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
}
