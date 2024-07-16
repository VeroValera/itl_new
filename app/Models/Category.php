<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Получить все продукты, относящиеся к данной категории.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
