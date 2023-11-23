<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'price',
        'visible',
        'image'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
