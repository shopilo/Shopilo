<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{

    public $title;

    public $admin;

    /**
     * Create a new component instance.
     *
     * @param $admin
     * @param $title
     */
    public function __construct($admin = false, $title = '')
    {
        $this->title = $title;
        $this->admin = $admin;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return $this->admin ? view('web.admin.layouts.guest') : view('layouts.guest');
    }
}
