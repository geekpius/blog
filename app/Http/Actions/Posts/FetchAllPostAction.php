<?php

namespace App\Http\Actions\Posts;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class FetchAllPostAction{
    use ApiResponseTrait;

    public function handle(): JsonResponse
    {
        return $this->apiSuccessResponse(
            'Found posts',
            PostResource::collection(Post::with('file')->get()),
        );
    }
}
