<?php
namespace App\Post;

use App\Models\Post;
use App\Post\PostRepository;

class EloquentPostRepository implements PostRepository
{
    public function find(int $id): Post
    {
        return Post::find($id);
    }

    public function save(Post $post): void
    {
        $post->save();
    }

    public function getAll(): array
    {
        return Post::all()->all();
    }

    public function delete(int $id): void
    {
        $post = $this->find($id);
        if($post) {
            $post->delete();
        }
    }

    public function create(array $postData): Post
    {
        return Post::create($postData);
    }
}
