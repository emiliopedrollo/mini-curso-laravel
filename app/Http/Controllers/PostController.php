<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return Response
     */
    public function store(PostStoreRequest $request)
    {
        Post::create($request->validated());

        $request->session()->flash('status','Post saved successfully');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
    public function edit(Post $post)
    {
//        $post = Post::find($id);
        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        $request->session()->flash('status','Post updated successfully');
        return redirect()->route('posts.show',$post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     * @throws Exception
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        $request->session()->flash('status','Post deleted successfully');
        return redirect()->route('posts.index');
    }
}
