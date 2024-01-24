<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function addToCart(Request $request)
    {
        $users_id = $request->users_id;
        $products_id = $request->products_id;
        $status = 'dikeranjang';
        $price = $request->price;
        $quantity = $request->quantity;

        if($quantity == 0)
        {
            return redirect()->back()->with('status', 'Silahkan Isi Jumlah Produk');
        }

        else
        {
            $date = date('Ymdhis');

            Transaction::create([
                'users_id'=>$users_id,
                'products_id'=>$products_id,
                'status'=>$status,
                'order_id'=>'ORD_'.$date,
                'price'=>$price,
                'quantity'=>$quantity,
            ]);
    
            return redirect()->back()->with('status', 'Berhasil Menambah Keranjang');
        }

    }
}
