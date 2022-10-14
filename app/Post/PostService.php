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

    public function createPost(array $postData): void
    {
        $this->postRepository->create($postData);
    }

    public function getPost(int $id): Post
    {
        return $this->postRepository->find($id);
    }

    public function getPage(int $pageNumber)
    {
        return $this->postRepository->getPage($pageNumber);
    }

    public function editPost(int $postId, array $attributes): Post
    {
        $post = $this->postRepository->find($postId);
        $post = $this->setPostAttributes($post, $attributes);
        $this->postRepository->save($post);
        return $post;
    }

    public function deletePost(int $postId): void
    {
        $this->postRepository->delete($postId);
    }

    private function setPostAttributes(Post $post, array $attributes): Post
    {
        $post->title = $attributes["title"];
        $post->body = $attributes["body"];
        return $post;
    }
}
