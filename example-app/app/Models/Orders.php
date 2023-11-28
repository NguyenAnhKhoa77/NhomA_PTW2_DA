<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['bill_id', 'product_id', 'quantity'];

    public function bill()
    {
        return $this->belongsTo(Bills::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
