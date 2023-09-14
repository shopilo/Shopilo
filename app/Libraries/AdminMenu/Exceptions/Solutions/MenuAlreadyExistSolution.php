<?php

namespace App\Libraries\AdminMenu\Exceptions\Solutions;

use App\Libraries\AdminMenu\AdminMenuCollection;
use Spatie\Ignition\Contracts\Solution;

class MenuAlreadyExistSolution implements Solution
{
    protected AdminMenuCollection $menu;

    public function __construct(AdminMenuCollection $menu)
    {
        $this->menu = $menu;
    }

    public function getSolutionTitle(): string
    {
        return __('Menu already exists');
    }

    public function getSolutionDescription(): string
    {
        return __(
            'The menu item **:menu** with same route already exists',
            ['menu' => $this->menu->label, 'route' => $this->menu->route]
        );
    }

    public function getDocumentationLinks(): array
    {
        return [];
    }
}
