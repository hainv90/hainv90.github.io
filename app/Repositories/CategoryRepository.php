<?php 
 namespace App\Repositories;
 use App\Models\Category;

 class CategoryRepository
 {
 	protected $categoryModel;

 	public function __construct()
 	{
 		$this->categoryModel = new Category;
 	}

 	public function save(array $input, int $id = null)
 	{
 		return $this->categoryModel->updateOrCreate(
 			[
 				'id' => $id
 			],
 			[
				'name' 		   => $input['name'],
				'slug' 		   => $input['slug'],
				'parent_id'	   => $input['parent_id'] ?? 0,
				'is_home' 	   => $input['is_home'],
				'meta_title'   => $input['meta_title'],
				'meta_desc'    => $input['meta_desc'],
				'meta_keyword' => $input['meta_keyword'],
 			]
 		);
 	}

 	public function getAll($limit = 15)
 	{
 		return Category::paginate($limit);
 	}

 	public function find($id)
 	{
 		return $this->categoryModel->find($id);
 	}

 	public function destroy(array $ids)
 	{
 		return $this->categoryModel->destroy($ids);
 	}
 }