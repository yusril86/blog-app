<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $articles = Article::all();

        return view('pages.backend.article.index',compact('articles')); */

        $articles = Article::query();
        $categories = Category::all();

        if ($request->has('query') && $request->filled('query')) {
        $searchQuery = $request->input('query');
        $articles->where('title', 'like', '%' . $searchQuery . '%')
            ->orWhere('author', 'like', '%' . $searchQuery . '%');        
        }

        if ($request->has('category') && $request->filled('category')) {
            $categoryFilter = $request->input('category');
            $articles->where('category_id', $categoryFilter);
        }

         $articles = $articles->get();


         return view('pages.backend.article.index',compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.backend.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => '',
            'author' => 'required',
            'date' => 'required',
            'thumbnails' => 'required'                       
        ]);
        
        if($request->hasFile('thumbnails')){
            $images = time() . '_' . Str::slug($request->title) . '.' . $request->file('thumbnails')->extension();
            $request->file('thumbnails')->move(public_path('thumbnails/news'),$images);
            $validation['thumbnails'] = 'news/' .$images;
        }

        $validation['slug'] = Str::slug($request->title.$request->date);
        $validation['views'] = 0 ;

        Article::create($validation);
        return redirect(route('article.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        
        return view('pages.backend.article.edit',[
            'article'=> $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validation = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => '',
            'author' => 'required',
            'date' => 'required',
            'thumbnails' => ''
        ]);

        if($request->hasFile('thumbnails')){
            $images = time() . '_' . Str::slug($request->title) . '.' . $request->file('thumbnails')->extension();
            $request->file('thumbnails')->move(public_path('thumbnails/news'),$images);
            File::delete("thumbnails/$article->thumbnails");
            $validation['thumbnails'] = 'news/' .$images;
        }

        $validation['slug'] = Str::slug($request->title.$request->date);

        $article->update($validation);
        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        File::delete("thumbnails/$article->thumbnails");

        $article->delete();

        return redirect(route('article.index'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $articles = Article::where('title', 'like', "%" . $keyword . "%");

        return dd($articles);
        // return view('pages.backend.article.index', compact('articles'));
    }
}
