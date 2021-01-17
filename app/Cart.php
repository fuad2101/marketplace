<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;
use App\ProductGallery;

class Cart extends Model
{
    protected $fillable = [
        'users_id', 'products_id',

    ];
    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
