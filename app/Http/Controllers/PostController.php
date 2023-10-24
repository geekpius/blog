<?php

namespace App\Http\Controllers;

use App\Http\Actions\Posts\CreatePostAction;
use App\Http\Actions\Posts\DeletePostAction;
use App\Http\Actions\Posts\FetchAllPostAction;
use App\Http\Actions\Posts\ShowPostAction;
use App\Http\Actions\Posts\UpdatePostAction;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FetchAllPostAction $action): JsonResponse
    {
        return $action->handle();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request, CreatePostAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, ShowPostAction $action): JsonResponse
    {
        return $action->handle($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, UpdatePostAction $action): JsonResponse
    {
        return $action->handle($request, $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, DeletePostAction $action): JsonResponse
    {
        return $action->handle($post);
    }
}
