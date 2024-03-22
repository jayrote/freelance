<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function seller()
        {
            return $this->belongsTo(User::class,'sid');
        }

    public function buyer()
        {
            return $this->belongsTo(User::class,'uid');
        }
}
