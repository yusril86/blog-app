<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    
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

        // return response()->json($article, 201,'success');

        return response()->json([
            'status'=>201,
            'message'=>'success',
            'data' => $validation             
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
