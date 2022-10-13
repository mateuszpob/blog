<?php
namespace App\Post;

use App\Models\Post;

class PostService
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost(array $postData)
    {
        $this->postRepository->create($postData);
    }

    public function getPost(int $id): Post
    {
        return $this->postRepository->find($id);
    }
}
