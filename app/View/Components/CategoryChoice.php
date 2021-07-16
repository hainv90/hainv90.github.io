<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\CategoryService;

class CategoryChoice extends Component
{
    public $categoryChoice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
       $this->categoryChoice = $categoryService->getChoice();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category-choice');
    }
}
