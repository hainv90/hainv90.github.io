<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;

class HomeController extends Controller
{
	protected $productService;

	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}
	public function index(Request $request)
	{
		$products = ($request->keyword || $request->category_id) ? $this->productService->search($request) : $this->productService->getNewest();
    	return view('frontend.home.index', [
    		'products' => $products
    	]);
	}
}
