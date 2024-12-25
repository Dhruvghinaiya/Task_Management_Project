<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

namespace App\View\Components;

use Illuminate\View\Component;

class AlertMessage extends Component
{
    public $status;
    public $message;

    /**
     * Create a new component instance.
     *
     * @param string $status
     * @param string $message
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert-message');
    }
}
