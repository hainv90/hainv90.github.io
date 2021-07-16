<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\ProductService;

class CartController extends Controller
{
	protected $productService;

	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}
    public function index()
    {
    	$product = Session::get('cart');
    	return view('frontend.carts.index', [
    		'product' => $product
    	]);
    }

    public function store(Request $req, $id)
    {
    	try {
	    	$product = $this->productService->findById($id);
	    	$cart = Session::get('cart') ?? collect();

	    	$productInCart = $cart->where('id', $id)->first();

	    	if($cart->count() === 0 || !$productInCart) {
	    		$product['qty'] = 1;
	    		$cart->push($product);
	    	}else {
	    		$productInCart['qty'] += 1;
	    	}

	    	Session::put('cart', $cart);
	    	return redirect()->back();
    	} catch (\Exception $e) {
    		report($e);
    		abort(500);
    	}
    }

    public function update(Request $request)
    {
    	$cart = Session::get('cart') ?? collect();
    	if($cart->count())
    		foreach($request->qty as $productId => $qty) {
    			if($qty <= 0 || !is_numeric($qty)) { continue; }
    			$productInCart = $cart->where('id', $productId)->first();
    			$productInCart['qty'] = $qty;
    		}
    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$cart = Session::get('cart') ?? collect();

    	$products = $cart->reject(function($product) use($id){
    		return $product->id == $id;
    	});
    	Session::put('cart', $products);
    	return redirect()->back();
    }
}
