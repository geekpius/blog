<?php

namespace App\Http\Actions\Posts;

use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class UpdatePostAction{
    use ApiResponseTrait;

    public function handle(UpdatePostRequest $request, Post $post): JsonResponse
    {
        try {
            $post->update($request->validated());
            return $this->apiSuccessResponse('Updated', new PostResource($post));
        }catch (\Exception $exception){
            report($exception);
        }

        return $this->apiErrorResponse();
    }
}
