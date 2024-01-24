<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\User;
use Illuminate\Http\Request;

class TopUpController extends Controller
{
    public function topUpList()
    {
        $topUps = TopUp::all();
        return view('bank.topup_list', compact('topUps'));
    }

    public function newTopUp()
    {
        $users = User::all();

        return view('bank.new_topup', compact('users'));
    }
}
