<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post\PostService;

class HomeController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getHomePage()
    {
        $pageNumber = 1;
        return view(home_template(), ["posts" => $this->postService->getPage($pageNumber)]);
    }
}
