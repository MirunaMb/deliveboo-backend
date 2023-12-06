<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getImageAttribute($image)
    {
        return $this->getAbsUriImage($image);
    }

    public function getAbsUriImage($image)
    {
        return $image ? Storage::url($image) : "";
    }

    public function order() {
        return $this->belongsToMany(Order::class);
      }
}
