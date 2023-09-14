<?php

namespace App\Libraries\AdminMenu\Exceptions;

use App\Libraries\AdminMenu\AdminMenuCollection;
use App\Libraries\AdminMenu\Exceptions\Solutions\MenuAlreadyExistSolution;
use Exception;
use Spatie\Ignition\Contracts\Solution;
use Spatie\Ignition\Contracts\ProvidesSolution;

class MenuAlreadyExistException extends Exception implements ProvidesSolution
{
    protected $menu;

    public function __construct(AdminMenuCollection $menu)
    {
        $this->menu = $menu;
    }

    public function getSolution(): Solution
    {
        return new MenuAlreadyExistSolution($this->menu);
    }
}
