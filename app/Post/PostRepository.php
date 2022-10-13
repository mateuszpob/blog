<?php
namespace App\Post;

use App\Models\Post;

interface PostRepository
{
    public function find(int $id): Post;
    public function save(Post $post): void;
    public function getAll(): array;
    public function delete(int $id): void;
    public function create(array $postData): Post;
    public function getPage(int $pageNumber);
}
