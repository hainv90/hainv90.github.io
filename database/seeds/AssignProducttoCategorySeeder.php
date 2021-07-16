<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;
class AssignProducttoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id')->toArray(); //lấy ra tất cả danh mục
    	Product::chunk(15, function($products) use ($categories) { //mỗi lần lấy ra 15 sản phẩm
    		foreach($products as $product)// duyệt sản phẩm
    		{
    			$product->categories()->sync([Arr::random($categories)]); // lấy ra ngẫu nhiên 1 danh mục asign vào sản phẩm đó
    		}
    	});
    }
}
