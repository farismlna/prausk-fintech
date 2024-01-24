<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {
        $categories = Category::all();

        return view('kantin.add_product', compact('categories'));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $price = $request->price;
        $stock = $request->stock;
        $photo = $request->photo;
        $desc = $request->desc;
        $categories_id = $request->categories_id;
        $stand = $request->stand;

        Product::create([
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'photo' => $photo,
            'desc' => $desc,
            'categories_id' => $categories_id,
            'stand' => $stand,
        ]);

        return redirect('/product')->with('status', 'Berhasil Menambah Product Baru');
    }

    public function edit(Request $request, $id)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('kantin.edit_product', compact('id', 'products', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $price = $request->price;
        $stock = $request->stock;
        $photo = $request->photo;
        $desc = $request->desc;
        $categories_id = $request->categories_id;
        $stand = $request->stand;

        Product::find($id)->update([
            'name' => $name,
            'price' => $price,
            'stock' => $stock,
            'photo' => $photo,
            'desc' => $desc,
            'categories_id' => $categories_id,
            'stand' => $stand,
        ]);

        return redirect('/product')->with('status', 'Berhasil Mengubah Product');

    }

    public function destroy($id)
    {
        $delete = Product::find($id)->delete();

        if ($delete)
            return redirect('/product')->with('status', 'Berhasil Menghapus Product');
        else 
            return redirect('/product')->with('status', 'Gagal Menghapus Product');
    }
}
