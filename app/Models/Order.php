<?php

namespace App\Models;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'guest_name',
    'guest_surname',
    'guest_address',
    'guest_phone',
    'guest_mail',
    'totalItem',
  ];

  public function posts()
  {
    return $this->belongsToMany(Dish::class);
  }
}
