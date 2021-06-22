<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     * @return Post
     */
    public function store(PostStoreRequest $request)
    {
        $params = $request->validated();
        return Post::create($params);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Post
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return bool
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $params = $request->validated();
        return $post->update($params);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return bool
     */
    public function destroy(Post $post)
    {
        return $post->delete();
    }
}
