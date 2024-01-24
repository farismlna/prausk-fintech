<?php

namespace App\Http\Controllers;

use App\Models\TarikTunai;
use App\Models\User;
use Illuminate\Http\Request;

class TarikTunaiController extends Controller
{
    public function withdrawList()
    {
        $withdraws = TarikTunai::all();

        return view('bank.withdraw_list', compact('withdraws'));
    }

    public function newWithDraw()
    {
        $users = User::all();

        return view('bank.new_withdraw', compact('users'));
    }
}
