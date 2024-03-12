<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Category_post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('pages.posts.index', compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->name = $request->input('name');
        $post->slug =  Str::slug($request->input('name'));
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('thumbnail'), $filename);
            $post->thumbnail = $filename;
        }
        $post->description = $request->input('description');
        $post->content = $request->input('content');
        $post->save();

        $id= DB::getPdo()->lastInsertId();
        $categoryIds = $request->input('category');
        foreach ($categoryIds as $categoryId) {
            Category_post::create([
                'post_id'=>$id,
                'category_id' => $categoryId,
            
            ]);
        }

        return redirect()->route('posts.index')
            ->with('success', 'Posts created successfully.');
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
        $post = Post::find($id) ;
        $categories = Category::all();
        return view('pages.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->name= $request->name;
        $post->slug= $request->name;
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('thumbnail'), $filename);
            $post->thumbnail = $filename;
        }
        $post->description= $request->description;
        $post->content= $request->content;

        $post->save();

        $selectedCategoryIds = $request->input('category');
        Category_post::where('post_id', $id)->delete();
        foreach ($selectedCategoryIds as $categoryId) {
            Category_post::create([
                'post_id' => $id,
                'category_id' => $categoryId,
            ]);
        }

        return redirect()->route('posts.index')->with('success', 'Post Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        Category_post::where('post_id', $id)->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
