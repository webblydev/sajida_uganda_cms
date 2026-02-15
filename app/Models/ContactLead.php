<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    // Scope for unread leads
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // Scope for read leads
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    // Mark as read
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    // Mark as unread
    public function markAsUnread()
    {
        $this->update(['is_read' => false]);
    }
}
