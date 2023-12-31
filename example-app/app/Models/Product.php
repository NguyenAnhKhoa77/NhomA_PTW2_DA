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
        'unique_token',
        'inventory',

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

    public function sex()
    {
        return $this->belongsTo(sex::class, 'sex');
    }
    public function sizes()
    {

        return $this->belongsToMany(Size::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
