<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends BaseController
{
    protected $productRepository;
    protected $productService;

    public function __construct(ProductRepository $productRepository, ProductService $productService)
    {
    	$this->productRepository = $productRepository;
    	$this->productService    = $productService;
    }

    public function index()
    {
    	try {
    		return response()->json([
    			'status' => true,
    			'code'   => 200,
    			'data'   => $this->productRepository->getAll(),
    		]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }

    public function store(ProductRequest $request)
    {
    	try {
	    	$input = $request->only([
	    		'name',
	    		'slug',
	    		'price',
	    		'sale_price',
	    		'discound',
	    		'meta_title',
	    		'meta_desc',
	    		'meta_keyword',
	    	]);
	    	// thêm mới sp và assign sp đó thuộc danh mục nào(xli tại service)
	    	$product = $this->productService->save($input, $request->category_ids);
	    	return response()->json([
	    		'status' => true,
	    		'code'	 => 200,
	    		'data'	 => $product,
	    	]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }

    public function update(ProductRequest $request, $id)
    {
    	try {
    		$input = $request->only([
    			'name',
    			'slug',
    			'price',
    			'sale_price',
    			'discound',
    			'meta_title',
    			'meta_desc',
    			'meta_keyword',
    		]);
    		return response()->json([
    			'status' => true,
    			'code'   => 200,
    			'data'   => $this->productRepository->save($input, $id),
    		]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }
    public function destroy($id)
    {
    	try {
    		return response()->json([
    			'status' => true,
    			'code'   => 200,
    			'data'   => $this->productRepository->destroy([$id])
    		]);

    	} catch(Exception $e) {
    		return $thí->systemErrors($e);
    	}
    }
}
