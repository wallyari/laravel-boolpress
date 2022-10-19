<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags= Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
        'title'=>'required|max:255',
        'content'=>'required|max:255',
        'category_id'=>'nullable|exists:categories,id',
        'tags'=>'exists:tags,id',
        'image'=>'nullable|image|max:9000'
    ]);

    $data = $request->all();

    $img_path = Storage::put('cover', $data['image']);
    $data['cover']= $img_path;
    
    
    $post= new Post();
    $post->fill($data);
    $slug =Str::slug($post->title,'-');
    $checkPost= Post::where('slug', $slug)->first();
    $counter=1;
    
    while($checkPost){
        $slug =Str::slug($post->title. '-'. $counter,'-');
        $counter++;
        $checkPost = Post::where('slug', $slug)->first();
    }
    
    
    $post->slug = $slug;
    $post->save();
    
    //primo argomento  $key - secondo $array da verificare
    if(array_key_exists('tags', $data)){
    $post->tags()->sync($data['tags']);
    }
    
    return redirect()->route('admin.posts.index')->with('status', 'Post create!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        {
            $categories = Category::all();
            $tags = Tag::all();
            return view('admin.posts.edit', compact('post','categories','tags'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required|max:255',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'exists:tags,id',
            'image'=>'nullable|image|max:9000'
        ]);
        
        $data = $request->all();
        if(array_key_exists('image', $data)){
            if($post->cover){
            Storage::delete($post->cover);
            }
            $img_path = Storage::put('cover', $data['image']);
            $data['cover']= $img_path;   
        }
        
        if ($post->title !== $data['title']){
            $slug = Str::slug($data['title'], '-');

        $checkPost = Post::where('slug', $slug)->first();

        $counter=1;
        while($checkPost){
            $slug = Str::slug($data['title']. '-'. $counter, '-');
            $counter++;
            $checkPost = Post::where('slug', $slug)->first();
        }
        $data['slug']= $slug;
        }
        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
            } else {
                $post->tags()->sync([]);
            }
        return redirect()->route('admin.posts.index')->with('status','Post update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        if($post->cover){
            Storage::delete($post->cover);
        }
        
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('status','Post delete!');
    }

    public function deleteCover(Post $post){
        if($post->cover){
            Storage::delete($post->cover);
        }
        $post->cover=null;
        $post->save();
        return redirect()->route('admin.posts.edit',['post'=> $post->id])->with ('status', 'Immagine ancellata con successo');

        }
}
