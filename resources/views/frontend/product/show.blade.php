@extends('layouts.frontend.master')
@section('page_title', $product->slug ?? $product->name)
@section('meta_desc', $product->desc ?? $product->name)
@section('meta_keyword', $product->keyword ?? $product->name)

@section('contend')
	<style type="text/css">
		.detail a {
			background: #ff6f61;
		    font-family: inherit;
		    font-weight: 600;
		    color: #fff;
		    text-decoration: none;
		    border: none;
		    border-radius: 2px;
		    padding: 5px 50px;
		    font-size: 20px;
		    cursor: pointer;
		}
	</style>
	<div class="subDetail">
    <div class="container">
        <a href="/">home</a> / <a href="">{{ $product->name }}</a>
    </div>
	</div>


	<div class="detailProduct">
	    <div class="container">
	        <div class="item">
	            <div class="gallery">

	                <div class="full"><img src="{{url('images/top1large.jpg')}}"/></div>
	            </div>
	            <div class="detail">
	                <h1>{{ $product->name }}</h1>
	                <h2>$ {{ $product->price }}</h2>
	                <ul>
	                    <li>SKU: <span>w10</span></li>
	                    <li>Availability: <span>Many in stock</span></li>
	                    <li>Vendor: <span>Guess</span></li>
	                    <li>Product Type: <span>Bags</span></li>
	                    <li>Barcode: <span>0123456789</span></li>
	                    <li>Tags: <span>Awesome</span></li>
	                </ul>
	                <a href="{{ route('cart.store', ['id' => $product->id]) }}">ADD TO CART</a>
	                
	            </div>
	        </div>
	    </div>
	</div>
	<div style="clear: both"></div>

	<div class="container">
	    <div class="moreProduct">
	        sản phẩm liên quan
	    </div>

	</div>

	<list-product>
	    <div class="container">
	        <div class="__product">
        		@foreach($products as $product)
		            <div class="item">
		                <div class="image">
		                    <a href="{{ url($product->slug) }}/product"><img src="{{url('images/product-5.jpg')}}" alt=""></a>
		                    <div class="function">
		                        <a href=""><i class="fal fa-heart"></i></a>
		                        <a href="{{ url($product->slug) }}/product"><i class="fal fa-eye"></i></a>
		                        <a href=""><i class="fal fa-shopping-cart"></i></a>
		                    </div>
		                </div>
		                <h2>{{ $product->name }}</h2>
		                <h2><s>{{ number_format($product->price, 0) }} $</s><span>{{ number_format($product->sale_price, 0) }} $</span></h2>
		            </div>
    			@endforeach
	        </div>
	    </div>
	</list-product>
@endsection