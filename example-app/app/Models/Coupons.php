<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', //mã giảm giá
        'discount_percent', //tỉ lệ giảm
        'expiration_date' //ngày hết hạn
    ];
}
