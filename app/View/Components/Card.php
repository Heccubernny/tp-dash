<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $width,
        public string $height,
        public string $type,
        public string $text_size,
        public string $collection,
        public string $title,
        public string $name,
        public string $header,

        )
    {
        //

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }

    public function isDisabled(string $option):bool{
        return $option === $this->selected;
    }
}
