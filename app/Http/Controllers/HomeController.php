<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\TarikTunai;
use App\Models\TopUp;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'siswa') 
        {
            $wallets = Wallet::where('users_id', Auth::user()->id)->where('status', 'selesai')->get();
            $credit = 0;
            $debit = 0;

            foreach ($wallets as $wallet) 
            {
                $credit += $wallet->credit;
                $debit += $wallet->debit;
            }

            $saldo = $credit - $debit;
            $products = Product::all();
            $carts = Transaction::where('status', 'dikeranjang')->where('users_id', Auth::user()->id)->get();

            $total_biaya = 0;

            foreach ($carts as $cart) 
            {
                if($cart->product->stock > 0)
                {
                    $total_price = $cart->price * $cart->quantity;
                    $total_biaya += $total_price;
                }
            }

            $mutasi = Wallet::where('users_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $transactions = Transaction::where('status', 'diambil')->where('users_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5)->groupBy('order_id');

            // dd($wallets);

            $categories = Category::all();

            return view('home', compact('products', 'carts', 'saldo', 'total_biaya', 'mutasi', 'transactions', 'categories'));
        }
        else if (Auth::user()->role == 'bank') 
        {
            $wallets = Wallet::get();
            $credit = 0;
            $debit = 0;

            foreach ($wallets as $wallet) {
                $credit += $wallet->credit;
                $debit += $wallet->debit;
            }

            return view('bank.dashboard', compact('wallets'));
        } 
        else if (Auth::user()->role == 'kantin') 
        {
            $products = Product::all();
            $categories = Category::all();
            $transactions = Transaction::where('status', 'dibayar')->get();

            return view('kantin.dashboard', compact('products', 'categories', 'transactions'));
        } 
        // else if (Auth::user()->role == 'admin') 
        // {
        //     $product = Product::all()->count();
        //     $nasabah = User::all()->count();
        //     return view('home', compact('product', 'nasabah'));
        // } 


    }

    public function product()
    {
        $products = Product::all();

        return view('kantin.product', compact('products'));
    }

    public function topup()
    {
        return view('siswa.topup');
    }

    public function tarikTunai()
    {
        return view('siswa.tarik_tunai');
    }

    public function viewCart()
    {
        return view('siswa.cart');
    }
}
