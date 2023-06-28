<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    function __construct()
    {
        $this->middleware('role:cashier');
    }

    public function index() {
        $user = auth()->user();

        $profile = [
            'name' => $user->name,
            'username' => $user->username,
            'img' => asset('assets/compiled/jpg/'. random_int(1,8) .'.jpg')
        ];
        
        return view('cashier', [
            'title' => 'Cashier Page',
            'profile' => $profile
        ]);
    }
}
