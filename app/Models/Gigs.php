<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gigs extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }

    public function category()
        {
            return $this->belongsTo(Category::class);
        }
}