<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\CreateNewsRequest;
use Carbon\Carbon;
use App\Models\categorie;



class NewsController extends Controller
{

    /**
     * Display a listing of the news.
     */

    public function index()
    {

        $news = News::with('categorie')->get();
        return response()->json($news);
    }


    /**
     * Display active news items in descending order of publication date.
     * Exclude expired news items.
     */

    public function displayActiveNewsDesc()
    {

        // Retrieve non-expired news items in descending order of publication date
        $news = News::where('date_expiration', '>', Carbon::now())
                    ->orderByDesc('date_debut')
                    ->get();
        
        return response()->json($news);
    }

    public function store(CreateNewsRequest $request)
    {
        $category = Categorie::find($request->categorie);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $news = new News();
        $news->titre = $request->titre;
        $news->contenu = $request->contenu;
        $news->categorie_id = $request->categorie;
        $news->date_debut = $request->date_debut;
        $news->date_expiration = $request->date_expiration;
        $news->save();
    
        return response()->json(['message' => 'News created successfully'], 201);
    }


    public function update(CreateNewsRequest $request, $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $category = Categorie::find($request->categorie);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        


        $news->titre = $request->titre;
        $news->contenu = $request->contenu;
        $news->categorie_id = $request->categorie;
        $news->date_debut = $request->date_debut;
        $news->date_expiration = $request->date_expiration;
        $news->save();

        return response()->json(['message' => 'News updated successfully'], 200);
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
        
        return response()->json($news);
    }
    

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
    }

}
