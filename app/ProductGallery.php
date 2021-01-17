<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductGallery extends Model
{
    public $table = 'products_galleries';

    protected $fillable = [
        'photos', 'products_id',
    ];
    protected $hidden = [
        //
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
