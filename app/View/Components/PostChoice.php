<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\PostService;

class PostChoice extends Component
{
    public $postChoice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(PostService $postService)
    {
        $this->postChoice = $postService->getChoice();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post-choice');
    }
}
