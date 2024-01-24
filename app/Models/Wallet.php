<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['users_id', 'credit', 'debit', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
