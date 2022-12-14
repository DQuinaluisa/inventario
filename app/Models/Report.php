<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
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

    ];
}
