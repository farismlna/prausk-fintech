<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stand;
use App\Models\TarikTunai;
use App\Models\TopUp;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Bank',
            'username' => 'bank',
            'password' => Hash::make('bank'),
            'role' => 'bank'
        ]);

        User::create([
            'name' => 'Kantin',
            'username' => 'kantin',
            'password' => Hash::make('kantin'),
            'role' => 'kantin'
        ]);

        User::create([
            'name' => 'Faris',
            'username' => 'faris',
            'password' => Hash::make('faris'),
            'role' => 'siswa'
        ]);

        Category::create([
            'name' => 'Makanan'
        ]);

        Category::create([
            'name' => 'Minuman'
        ]);

        Category::create([
            'name' => 'Snack'
        ]);

        Product::create([
            'name' => 'Bakso',
            'price' => 10000,
            'stock' => 20,
            'photo' => '/images/bakso.jpg',
            'desc' => 'Bakso enak daging borax',
            'stand' => 2,
            'categories_id' => 1,
        ]);

        Product::create([
            'name' => 'Es Teh',
            'price' => 5000,
            'stock' => 30,
            'photo' => '/images/esteh.jpg',
            'desc' => 'Es teh pake air kali',
            'stand' => 1,
            'categories_id' => 2,
        ]);

        Product::create([
            'name' => 'Donut',
            'price' => 3000,
            'stock' => 15,
            'photo' => '/images/donut.jpg',
            'desc' => 'Donut dibolonginnya agak laen',
            'stand' => 1,
            'categories_id' => 3,
        ]);

        Wallet::create([
            'users_id' => 3,
            'credit' => 100000,
            'debit' => null,
            'description' => 'buka tabungan',
            'status' => 'selesai',
        ]);

        Transaction::create([
            'users_id' => 3,
            'products_id' => 1,
            'status' => 'dikeranjang',
            'order_id' => 'INV_12345',
            'price' => 10000,
            'quantity' => 1,
        ]);

        Transaction::create([
            'users_id' => 3,
            'products_id' => 2,
            'status' => 'dibayar',
            'order_id' => 'INV_12345',
            'price' => 5000,
            'quantity' => 2,
        ]);

        Transaction::create([
            'users_id' => 3,
            'products_id' => 3,
            'status' => 'dikeranjang',
            'order_id' => 'INV_12345',
            'price' => 6000,
            'quantity' => 2,
        ]);

        $total_debit = 0;

        $transactions = Transaction::where('total_debit', );

        foreach ($transactions as $key => $value) 
        {
            # code...
        }

        Stand::create([
            'name' => 'Cahaya Adi',
            'kelas' => 'X',
            'jurusan' => 'OTKP',
        ]);

        Stand::create([
            'name' => 'AA Iksan',
            'kelas' => 'XII',
            'jurusan' => 'RPL',
        ]);

        TopUp::create([
            'users_id' => 3,
            'order_id' => 'INV_12345',
            'nominal' => 20000,
            'status' => 'confirmed'
        ]);

        TarikTunai::create([
            'users_id' => 3,
            'order_id' => 'INV_12345',
            'nominal' => 10000,
            'status' => 'confirmed'
        ]);
    }
}
