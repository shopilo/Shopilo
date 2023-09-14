<?php

namespace App\Libraries\AdminMenu;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminMenu
{

    /**
     * @var string
     */
    protected $menu_name;

    /**
     * @param $menu_name
     * @return $this
     */
    public function __construct($menu_name = null)
    {
        if ($menu_name) {
            $this->menu_name = $menu_name;
            // check if menu exists
            if (!config('shopilo.admin_menu.' . $this->menu_name)) {
                config(['shopilo.admin_menu.' . $this->menu_name => []]);
            }
        }
        return $this;
    }

    /**
     * @param array $menu
     */
    public function register(AdminMenuCollection $menu)
    {
        return $this->add($menu);
    }

    /**
     * @return mixed
     */
    public function get($menu_name = '')
    {
        if (!$menu_name) {
            return config('shopilo.admin_menu');
        }
        $menu = config('shopilo.admin_menu.' . $menu_name);
        $new_menu = collect();
        if ($menu) {
            foreach ($menu as $item) {
                $new_menu->push($this->computeMenuItem($item));
            }
        }
        return $new_menu;
    }

    /**
     * @param $route
     * @return bool
     */
    public function isActive($route)
    {
        $currentRoute = Request::route()->getName();
        if ($currentRoute == $route) {
            return true;
        }
        return false;
    }

    /**
     * @param $menu_name
     * @return $this
     */
    private function computeMenuItem($menu_item)
    {
        $menu_item->active = $this->isActive($menu_item->route);
        $menu_item->url = route($menu_item->route, $menu_item->route_params);
        if ($menu_item->children) {
            foreach ($menu_item->children as $child) {
                $this->computeMenuItem($child);
            }
        }
        return $menu_item;
    }

    /**
     * @param $menu_name
     * @return $this
     */
    private function add(AdminMenuCollection $menu)
    {
        $key = str_replace('.', '_', $menu->route);
        if (!config('shopilo.admin_menu.' . $this->menu_name . '.' . $key)) {
            $admin_menu[$key] = $menu;
            config(['shopilo.admin_menu.' . $this->menu_name => $admin_menu]);
        } else {
            throw new Exceptions\MenuAlreadyExistException($menu);
        }
    }
}
