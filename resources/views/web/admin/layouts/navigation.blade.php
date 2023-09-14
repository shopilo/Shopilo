<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <a href="" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span>{{ __('Menu') }}</span>
                </li>
                @forelse((new \AdminMenu())->get('admin') as $menu)
                @if($menu->hasChildren())
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $menu->active ? 'active' : 'collapsed' }}"
                        href="#sidebar{{ str_replace('', '', $menu->label) }}" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebar{{ str_replace('', '', $menu->label) }}">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->label }}</span>
                    </a>
                    <div class="{{ $menu->active ? '' : 'collapse' }} menu-dropdown"
                        id="sidebar{{ str_replace('', '', $menu->label) }}">
                        <ul class="nav nav-sm flex-column">
                            @forelse($menu->children as $child)
                            <li class="nav-item">
                                <a href="{{ $child->url }}" class="nav-link {{ $child->active ? 'active' : '' }}">
                                    {{ $child->label }}
                                </a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $menu->active ? 'active' : '' }}" href="{{ route($menu->route) }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span>{{ $menu->label }}</span>
                    </a>
                </li>
                @endif
                @empty
                @endforelse
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>