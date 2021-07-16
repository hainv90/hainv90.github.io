<?php
namespace App\Services;
use App\Models\Product;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductService
{
	protected $productRepository;

	public function __construct(ProductRepository $productRepository)
	{
		$this->productRepository = $productRepository;
	}

	public function save(array $input, array $categoryIds, int $id = null)
	{
		try {
			DB::beginTransaction();
			$product = $this->productRepository->save($input, $id);
			if($id)
			{
				$product->categories()->sync($categoryIds);
			} else {
				$product->categories()->attach($categoryIds);
			}

			DB::commit();
			return $product;
		} catch(\Exception $e) {
			DB::Rollback();
			return [
				'code'    => $e->getCode(),
				'message' => $e->getMessage(),
			];
		}
	}

	public function findById($id)
	{
		return Product::where(['id' => $id])->first();
	}
	public function findBySlug($slug)
	{
		return Product::where(['slug' => $slug])->first();
	}

	public function getByCategoryId(array $categoryIds, int $productId = null)
	{
		$query = Product::join('category_product', function($query) use($categoryIds) {
			$query ->on('category_product.product_id', 'products.id')
			->whereIn('category_id', $categoryIds);
			});
		if(isset($productId))
		{
			$query->where('products.id', '!=', $productId);
		}
		return $query->get();
	}
	public function getNewest()
	{
		return Product::orderBy('id', 'DESC')->paginate(12);
	}

	public function search($input)
	{
		$query = Product::join('category_product', function($query) {
			$query->on('category_product.product_id', 'products.id');
		});
		if(!empty($input['keyword']))
		{
			$query->where('name', 'like', "%" . $input['keyword'] . "%");
		}
		if(!empty($input['category_id']))
		{
			$query->where(['category_product.category_id' => $input['category_id']]);
		}
		return $query->get();
	}
}