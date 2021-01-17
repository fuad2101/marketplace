<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use App\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {

        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('transaction', function ($product) {
            $product->where('users_id', Auth::user()->id);
        });

        $revenue = $transaction->get()->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });
        $customers = User::count();


        return view('pages.dashboard', [
            'transaction_count' => $transaction->count(),
            'transaction_data' => $transaction->get(),
            'revenue' => $revenue,
            'customers' => $customers,
        ]);
    }
}
