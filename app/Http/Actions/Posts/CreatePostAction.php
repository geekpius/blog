<?php

namespace App\Http\Actions\Posts;

use App\Events\CreateFileEvent;
use App\Http\Requests\CreatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class CreatePostAction{
    use ApiResponseTrait;

    public function handle(CreatePostRequest $request): JsonResponse
    {
        try {
            $post = Post::create($request->validated());
            event(new CreateFileEvent($post, $request->bannerImage));
            return $this->apiSuccessResponse(
                'Successful',
                new PostResource($post->load('file')),
            );
        }catch (\Exception $exception){
            report($exception);
        }


        return $this->apiErrorResponse();
    }
}
