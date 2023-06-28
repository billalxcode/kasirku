<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code', 'product_name', 'unit_in_stock',
        'unit_price', 'category_id', 'unit_id'
    ];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function unit() {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
}
