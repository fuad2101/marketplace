<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $sellTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('product', function ($product) {
            $product->where('users_id', Auth::user()->id);
        })->get();

        $buyTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('transaction', function ($transaction) {
            $transaction->where('users_id', Auth::user()->id);
        })->get();



        return view('pages.dashboard-transactions', [
            'buyTransaction' => $buyTransaction,
            'sellTransaction' => $sellTransaction,
        ]);
    }

    public function details($id)
    {
        $transactionDetail = TransactionDetail::with(['transaction.user', 'product.galleries'])->findOrFail($id);

        return view('pages.dashboard-transactions-details', [
            'transactionDetail' => $transactionDetail,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $transactionDetail = TransactionDetail::with(['transaction.user', 'product.galleries'])->findOrFail($id);
        $transactionDetail->update($data);

        return redirect()->route('dashboard-transaction');
    }
}
