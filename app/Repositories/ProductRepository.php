<?php 
 namespace App\Repositories;
 use App\Models\Product;

 class ProductRepository
 {
 	protected $productModel;

 	public function __construct()
 	{
 		$this->productModel = new Product;
 	}

 	public function save(array $input, int $id = null)
 	{
 		return $this->productModel->updateOrCreate(
 			[
 				'id' => $id
 			],
 			[
				'name' 		   => $input['name'],
				'slug' 		   => $input['slug'],
				'price'	       => $input['price'],
				'image'	       => $input['image'] ?? 0,
				'sale_price'   => $input['sale_price'] ?? 0,
				'discound'     => $input['discound'] ?? 0,
				'meta_title'   => $input['meta_title'] ?? 0,
				'meta_desc'    => $input['meta_desc'] ?? 0,
				'meta_keyword' => $input['meta_keyword'] ?? 0,
 			]
 		);
 	}

 	public function getAll($limit = 15)
 	{
 		return $this->productModel->paginate($limit);
 	}

 	public function find($id)
 	{
 		return $this->productModel->find($id);
 	}

 	public function destroy(array $ids)
 	{
 		return $this->productModel->destroy($ids);
 	}
 }