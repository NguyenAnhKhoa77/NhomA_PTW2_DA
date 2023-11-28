<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'avatar',
        'address',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
