<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
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
        $this->authorize('create', Post::class);
        return view('panel.create_post');
    }

    public function createPost(CreatePostRequest $request)
    {
        $this->authorize('create', Post::class);
        $this->postService->createPost($request->validated());
        return redirect()->route('home');
    }

    public function getPostList()
    {
        $pageNumber = 1;
        return view('panel.posts', ["posts" => $this->postService->getPage($pageNumber)]);
    }

    public function getEditPostForm(int $postId)
    {
        $this->authorize('edit', Post::class);
        return view('panel.create_post', ["post" => $this->postService->getPost($postId)]);
    }

    public function editPost(CreatePostRequest $request, int $postId)
    {
        $this->authorize('edit', Post::class);
        $this->postService->editPost($postId, $request->validated());
        return redirect()->route('blog.postlist');
    }

    public function deletePost(int $postId)
    {
        $this->authorize('delete', Post::class);
        $this->postService->deletePost($postId);
        return redirect()->route('blog.postlist');
    }
}
