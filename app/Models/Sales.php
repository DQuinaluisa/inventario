<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_sales',
        'product_id',
        'departure_date'
    ];



    public function products (){
        return $this->hasMany(Product::class);
    }
}
