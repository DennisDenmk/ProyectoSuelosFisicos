<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class UpdatePassword extends Component
{
    public function render()
    {
        return view('components.forms.update-password');
    }
}
