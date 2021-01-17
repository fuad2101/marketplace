<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transactions;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $revenue = Transactions::sum('total_price');
        $transactions = Transactions::count();
        $user = User::count();


        return view('pages.admin.admin',[
            'user'=> $user,
            'revenue' => $revenue,
            'transactions' => $transactions,
        ]);
    }
}
