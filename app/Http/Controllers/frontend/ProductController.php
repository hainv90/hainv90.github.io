<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
	protected $productService;

	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}

	public function show($slug)
	{
		$product     = $this->productService->findBySlug($slug);
		$categoryIds = $product->categories->pluck('id')->toArray();
		$products    = $this->productService->getByCategoryId($categoryIds, $product->id);
		return view('frontend.product.show', [
			'product'  => $product,
			'products' => $products
		]);
	}
}
