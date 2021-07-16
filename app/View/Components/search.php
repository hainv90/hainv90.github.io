<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\CategoryService;

class search extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;

    public $categoryId;

    public function __construct(CategoryService $categoryService, $categoryId = null)
    {
        $this->categories = $categoryService->getAll();
        $this->categoryId = $categoryId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search');
    }
}
