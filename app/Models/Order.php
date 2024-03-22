<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function buyer()
        {
            return $this->belongsTo(User::class,'uid');
        }

    public function seller()
        {
            return $this->belongsTo(User::class,'sid');
        }

    public function gigs()
        {
            return $this->belongsTo(Gigs::class,'gig_id');
        }
}