<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Transactions;


class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id',
        'products_id',
        'price',
        'resi',
        'shipping_status',
        'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transactions::class, 'id', 'transactions_id');
    }
}
