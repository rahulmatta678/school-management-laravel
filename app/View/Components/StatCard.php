<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public $title;
    public $value;
    public $icon;
    public $variant;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $value, $icon = null, $variant = 'indigo')
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->variant = $variant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stat-card');
    }
}
