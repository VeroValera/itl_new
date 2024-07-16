<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name']; // Укажите остальные заполнения, если таковые имеются

    protected $table = 'brands'; // Убедитесь, что таблица соответствует вашей базе данных
}
