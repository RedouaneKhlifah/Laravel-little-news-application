<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;


class CategorieController extends Controller
{

    public function index()
    {
        $Categories  = Categorie::all();
        return response()->json($Categories);

    }

    public function searchCategoryByName(Request $request, $name)
    {
        $category = Categorie::where('name', $name)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Get the articles associated with the category and its sub-categories recursively
        $articals = $this->getCategoryArticlesRecursive($category);

        return response()->json(['articles' => $articals]);
    }

    private function getCategoryArticlesRecursive($category)
    {
        $articles = collect();
    

        $categoryNews = $category->news()->where('date_expiration', '>', Carbon::now())->get();
    
        // Assign the news articles to an array with the category name as the key
        $articles[$category->name] = $categoryNews;
    
        // Recursively find articles from sub-categories
        foreach ($category->children as $childCategory) {
            $childArticles = $this->getCategoryArticlesRecursive($childCategory);
            $articles = $articles->merge($childArticles);
        }
    
        return $articles;
    }
    
}

