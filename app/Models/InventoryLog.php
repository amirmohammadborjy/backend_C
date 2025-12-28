<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'user_id', 'old_stock', 'new_stock', 'changed_at'
    ];

    protected $dates = ['changed_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}


