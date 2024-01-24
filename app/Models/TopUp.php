<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    use HasFactory;

    protected $fillable = [ 'users_id', 'order_id', 'nominal', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
