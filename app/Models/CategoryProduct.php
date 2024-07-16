<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = [
        'category_id',
        'product_id',
    ];

    // Отношение с моделью Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Отношение с моделью Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
