<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code',
        'product_price',
        'product_stock',
        'product_lote',
        'date_entry',
        'date_expiration',
        'category_id',
        'provider_id'
    ];

    public function categories() {
        return $this->hasOne(Category::class);
    }

    public function providers() {
        return $this->hasMany(Provider::class);
    }

    public function sales() {
        return $this->belongsTo(Sales::class);
    }

    public function scopeCode ($query, $product_code)
    {
        if($product_code)
        {
            return $query->where('product_code', 'LIKE', "%$product_code%");
        }
    }

}
