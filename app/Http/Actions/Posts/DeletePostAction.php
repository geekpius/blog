<?php

namespace App\Http\Actions\Posts;

use App\Models\Post;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DeletePostAction{
    use ApiResponseTrait;

    public function handle(Post $post): JsonResponse
    {
        $post->delete();
        return $this->apiNoContentResponse();
    }
}
