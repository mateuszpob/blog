<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Post\PostService;

class BlogController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getCreatePostForm()
    {
        return view('blog.create_post');
    }

    public function createPost(CreatePostRequest $request)
    {

        $this->postService->createPost($request->validated());
    }
}
