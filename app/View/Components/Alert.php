<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    public $type;
    public $messages;

    public function __construct($type = 'success', $messages = [])
    {
        $this->type = $type;
        $this->messages = is_array($messages) ? $messages : [$messages];
    }

    public function render()
    {
        return view('components.alert');
    }
}
