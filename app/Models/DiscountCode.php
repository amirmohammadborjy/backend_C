<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'code', 'discount_percent', 'expires_at'
    ];

    protected $dates = ['expires_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}





