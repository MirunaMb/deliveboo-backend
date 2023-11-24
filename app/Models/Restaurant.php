<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'phone_number',
        'vat',
        'label',
        'image'
    ];
    //*USER
    public function user()
    {

        return $this->belongsTo(User::class);
    }
    //*Types
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    //*DISHES
    public function dishes()
    {
        return $this->hasMany(dish::class);
    }

    public function getAbsUriImage()
    {
        return $this->image ? Storage::url($this->image) : "";
    }
}
