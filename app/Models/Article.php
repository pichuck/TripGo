<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'user_id', 'content', 'image', 'location', 'tags', 'rating', 'travel_duration', 'tips_guide'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
