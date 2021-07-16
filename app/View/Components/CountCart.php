<?php

namespace App\View\Components;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class CountCart extends Component
{
    public $total = 0;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $cart = Session::get('cart') ?? collect();
        $total = 0;
        foreach($cart as $product) {
            $total += $product->qty;
        }
        $this->total = $total;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.count-cart');
    }
}
