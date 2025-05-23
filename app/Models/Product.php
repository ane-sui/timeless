<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
    
}
