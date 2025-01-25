<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class Navigation extends Component
{
    public $siteName;

    public function __construct($siteName = 'Suelo Lab')
    {
        $this->siteName = $siteName;
    }

    public function render()
    {
        return view('components.navigation');
    }
}
