<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();

        return view('blog.index',
            ['blogs' => $blog]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
        return view('blog.create', [
            'blog' => $blog
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        /** @var Blog $blog */
        $blog = new Blog();
        $blog->name = $request->get('name');
        $blog->save();

        return redirect(route('blogs.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
//        return view('blogs.list', [
//            'blog' => $blog
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        return view('blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $updatedBlog = Blog::find($blog->id);

        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $updatedBlog->name = $request->get('name');
        $updatedBlog->save();

        return redirect(route('blogs.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $posts = Post::where('blog_id', $blog->id)->get();

        if(count($posts)) {
            foreach ($posts as $post) {
                $post->delete();
            }
        }
        $blog->delete();

        return redirect(route('blogs.list'));
    }
}
