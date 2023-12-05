<?php

namespace App\Models;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function posts() {
        return $this->belongsToMany(Dish::class);
      }
}
