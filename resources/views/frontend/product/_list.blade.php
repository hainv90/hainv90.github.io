<list-product>
    <div class="container">
        <div class="titlePrimary">
             {{ $category->name ?? 'Top month Sellers' }}
        </div>
        <x-search category-id="{{ $category->id ?? null }}"></x-search>
        <div class="__product">
        @php
            $products = !empty($productPaginate) ? $productPaginate : $products;
        @endphp
            @foreach($products as $product)
                <div class="item">
                    <div class="image">
                        <a href="{{ url($product->slug) }}/product">
                            <img src="./images/product-6.jpg" alt="">
                        </a>
                        <div class="function">
                            <a href=""><i class="fal fa-heart"></i></a>
                            <a href="{{ url($product->slug) }}/product"><i class="fal fa-eye"></i></a>
                            <a href="{{ route('cart.store', ['id' => $product->id]) }}"><i class="fal fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <h2>{{ $product->name }}</h2>
                    <h2>
                        <s>{{ number_format($product->price, 0) }} $</s>
                        <span>{{ number_format($product->sale_price, 0) }} $</span>
                    </h2>
                </div>
            @endforeach
        </div>
        
    </div>
</list-product>