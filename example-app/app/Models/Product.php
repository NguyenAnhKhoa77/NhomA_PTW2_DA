<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'manufacturer_id',
        'categories_id',
        'sex',

    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'manufacturer_id');
    }
    public function order()
    {
        return $this->hasMany(Orders::class);
    }
}
