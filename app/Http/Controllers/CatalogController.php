<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('catalog.index', compact('categories'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id); // Находим категорию по ID
        return view('catalog.category', compact('category'));
    }

    public function showCategory(Category $category)
    {
        $products = $category->products()->get(); // Получаем товары для данной категории
        $categories = Category::all(); // Получаем все категории для вывода ссылок
        return view('catalog.category', compact('category', 'products', 'categories'));
    }
}
