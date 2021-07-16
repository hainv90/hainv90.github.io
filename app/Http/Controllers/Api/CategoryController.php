<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
    	$this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
    	try {
    		$categories = $this->categoryRepository->getAll();
    		return response()->json([
				'status' => true,
				'code'   => 200,
				'data'   => $categories,
    		]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }
    public function store(CategoryRequest $request)
    {
    	try {
    		$input = $request->only([
                'name',
                'slug',
                'parent_id',
                'is_home',
                'meta_title',
                'meta_desc',
                'meta_keyword',
            ]);

    		return response()->json([
    			'status' => true,
    			'code' => 200,
    			'data' => $this->categoryRepository->save($input)
    		]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }
    
    public function update(CategoryRequest $request, $id)
    {
    	try {
    		$input = $request->only([
                'name',
                'slug',
                'parent_id',
                'is_home',
                'meta_title',
                'meta_desc',
                'meta_keyword',
            ]);

    		return response()->json([
    			'status' => true,
    			'code'   => 200,
    			'data'	 => $this->categoryRepository->save($input, $id),
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
    			'data'   => $this->categoryRepository->destroy([$id]),
    		]);
    	} catch(\Exception $e) {
    		return $this->systemErrors($e);
    	}
    }
}
