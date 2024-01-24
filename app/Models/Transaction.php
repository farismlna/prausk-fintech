<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['users_id', 'products_id', 'status', 'order_id', 'price', 'quantity'];

    
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
