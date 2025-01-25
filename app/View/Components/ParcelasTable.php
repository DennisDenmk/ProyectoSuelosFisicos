<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ParcelasTable extends Component
{
    public $parcelas;
    public $success;
    public $error;

    public function __construct($parcelas, $success = null, $error = null)
    {
        $this->parcelas = $parcelas;
        $this->success = $success;
        $this->error = $error;
    }

    public function render()
    {
        return view('components.parcelas-table');
    }
}
