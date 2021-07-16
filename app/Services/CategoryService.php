<?php
namespace App\Services;
use App\Models\Category;

class CategoryService
{
	const PER_PAGE = 12;
	public function getAll()
	{
		return Category::get();
	}
	public function menus($limit = 6)
	{
		return Category::where(['is_home' => false])->take($limit)->get();
	}

	public function findBySlug($slug)
	{
		return Category::where(['slug' => $slug])->first();
	}
	public function getProducts(Category $category)
	{
		return $category->products()->paginate(12);
	}
	public function getChoice()
	{
		return Category::where(['is_home' => true])->take(3)->get();
	}
	public function search(Category $category, $keyword = null)
	{
		$query = $category->products();

		if($keyword)
		{
			$query->where('name', 'like', "%" . $keyword . "%");
		}
		return $query->get();
	}
}