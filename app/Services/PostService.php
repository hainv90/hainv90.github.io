<?php
namespace App\Services;
use App\Models\Post;

class PostService
{
	const PER_PAGE = 12;
	
	public function findBySlug($slug)
	{
		return Post::where(['slug' => $slug])->first();
	}
	public function getChoice()
	{
		return Post::where(['is_home' => true])->take(4)->get();
	}
}