<?php

namespace App\Libraries\AdminMenu;

use Illuminate\Support\Collection;

class AdminMenuCollection extends Collection
{
    public $active = false;

    public string $route;

    public array $route_params = [];

    public string $label;

    public string $icon;

    public string $url;

    public array $children = [];

    public function __construct(
        $route,
        $route_params = [],
        $label,
        $icon,
        $children = [],
    ) {
        $this->route = $route;
        $this->label = $label;
        $this->icon = $icon;
        $this->children = $children;
        $this->route_params = $route_params;
    }

    public function hasChildren(): bool
    {
        return count($this->children) > 0;
    }
}
