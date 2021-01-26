<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $categories = Categories::all();
        return view('pages.dashboard-settings', [
            'users' => $users,
            'categories' => $categories,
        ]);
    }
    public function account()
    {
        $users = Auth::user();
        return view('pages.dashboard-account', [
            'users' => $users,
        ]);
    }
    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);

        return redirect()->route($redirect);
    }
}
