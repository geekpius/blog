<?php

namespace App\Http\Actions\Posts;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class ShowPostAction{
    use ApiResponseTrait;

    public function handle(Post $post): JsonResponse
    {
        return $this->apiSuccessResponse(
            'Found posts',
            new PostResource($post->load('file')),
        );
    }
}
