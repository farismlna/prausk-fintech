<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function topUpNow(Request $request)
    {
        $user_id = Auth::user()->id;
        $credit = $request->credit;
        $status = "proses";
        $desc = 'Top Up Saldo';

        Wallet::create([
            'users_id' => $user_id,
            'credit' => $credit,
            'status' => $status,
            'description' => $desc,
        ]);

        return redirect()->back()->with('status', 'Berhasil Top Up, Silakan Tunggu Konfirmasi');
    }

    public function sendTopUp(Request $request)
    {
        $user_id = $request->user_id;
        $credit = $request->credit;
        $status = "selesai";
        $desc = 'Kirim Saldo ke Nasabah';

        Wallet::create([
            'users_id' => $user_id,
            'credit' => $credit,
            'status' => $status,
            'description' => $desc,
        ]);

        return redirect()->back()->with('status', 'Berhasil Mengirim Saldo Top Up');
    }

    public function requestWithdraw(Request $request)
    {
        $desc = 'Kirim Request Tarik Tunai';

        Wallet::create([
            'debit' => $request->debit,
            'description' => $desc,
            'users_id' => Auth::user()->id,
            'status' => 'proses',
        ]);

        return redirect('home')->with('status', 'Berhasil Mengirim Permintaan Tarik Tunai');
    }

    public function accWithdraw(Request $request)
    {
        $status = "selesai";
        $desc = 'Acc Tarik Tunai Nasabah';

        Wallet::create([
            'debit' => $request->debit,
            'description' => $desc,
            'users_id' => $request->user_id,
            'status' => $status,
        ]);

        return redirect('home')->with('status', 'Berhasil Mengirim Tarik Tunai');
    }

    public function request_topUp(Request $request)
    {
        $wallet = Wallet::find($request->id);
        if(!$wallet) return redirect()->back();
        $wallet->update([
            'status' => 'selesai',
        ]);

        return redirect()->back()->with('status', 'Berhasil Konfirmasi Top Up Nasabah');
    }

    public function getTopUpRequest()
    {
        $wallets = Wallet::where('status', 'proses')->get();
        // dd($wallets);

        return view('bank.topup_list', compact('wallets'));
    }

    public function getWithdrawRequest()
    {
        $wallets = Wallet::where('status', 'proses')->get();

        return view('bank.withdraw_list', compact('wallets'));
    }
}
