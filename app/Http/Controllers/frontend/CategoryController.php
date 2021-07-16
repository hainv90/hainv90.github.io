<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
	protected $categoryService;

	public function __construct(CategoryService $categoryService)
	{
		$this->categoryService = $categoryService;
	}

	public function index(Request $request, $slug)
	{
		$category = $this->categoryService->findBySlug($slug);
		if($keyword = $request->keyword) {
			$productPaginate  = $this->categoryService->search($category, $keyword);
		}else{
			$productPaginate  = $this->categoryService->getProducts($category);
		}

		return view('frontend.categories.index', [
			'category' => $this->categoryService->findBySlug($slug),
			'productPaginate' => $productPaginate
		]);
	}
}
