<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'is_published',
        'user_id',
    ];

    // Relazione con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
