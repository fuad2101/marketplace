<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Transactions extends Model
{

    protected $fillable = [
        'users_id',
        'insurance_price',
        'shipping_price',
        'total_price',
        'transaction-status',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
