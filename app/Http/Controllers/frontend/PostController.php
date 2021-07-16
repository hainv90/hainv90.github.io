<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
	protected $postService;

	public function __construct(PostService $postService)
	{
		$this->postService = $postService;
	}

	public function show($slug)
	{
		$postChoice = $this->postService->findBySlug($slug);
		return view('frontend.posts.show', [
			'postChoice' => $postChoice
		]);
	}
}
