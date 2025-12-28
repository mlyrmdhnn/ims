@php
    $total = $totalNotif->where('isAproved', 'pending')->count();
@endphp

<nav id="navbar-main" class="navbar is-fixed-top warna-header text-white">
    <div class="navbar-brand">
      <a class="navbar-item mobile-aside-button">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
      <div class="navbar-item">
      </div>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
      </a>
    </div>
    <div class="navbar-menu warna-header" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item dropdown has-divider">
        </div>
        <div class="navbar-item dropdown has-divider has-user-avatar">
          <a class="navbar-link">
            <div class="is-user-name text-black md:text-white"><span>{{ session('user.name') }}</span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown md:text-black">
            <a href="/proffile" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-settings"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-email"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">

          </div>
        </div>

        <form action="/logout" method="POST">
            @csrf
            <button title="Log out" class="navbar-item desktop-icon-only">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
                <span>Log out</span>
              </button>
        </form>
      </div>
    </div>
  </nav>

  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div>
        Admin <b class="font-black">One</b>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
          <a href="/dashboard">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
        <li class="{{ request()->is('inbox') ? 'active' : '' }}">
            <a href="/inbox ">
                <span class="icon"><i class="w-5 h-5 mdi mdi-inbox"></i></span>
                <span class="menu-item-label">Inbox<span class="text-red-500">
                    {{ $adminNotification > 9 ? '9+' : ($adminNotification > 0 ? $adminNotification : '') }}
                </span></span>
            </a>
        </li>
      </ul>
      <p class="menu-label">Examples</p>
      <ul class="menu-list">
        <li class="{{ request()->is('request') ? 'active' : '' }}">
          <a href="/request">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Request <span class="text-red-500">{{ $total > 9 ? '9+' : ($total > 0 ? $total : '') }}</span></span>
          </a>
        </li>
        <li class="{{ request()->is('transaction') ? 'active' : '' }}">
          <a href="/transaction">
            <span class="icon"><i class="mdi mdi-cash"></i></span>
            <span class="menu-item-label">Transaction</span>
          </a>
        </li>
        <li class="{{ request()->is('create/item') ? 'active' : '' }}">
          <a href="/create/item">
            <span class="icon"><i class="mdi mdi-pencil-outline"></i></span>
            <span class="menu-item-label">Create Item</span>
          </a>
        </li>
        <li class="{{ request()->is('warehouses') ? 'active' : '' }}">
          <a href="/warehouses">
            <span class="icon"><i class="mdi mdi-warehouse"></i></span>
            <span class="menu-item-label">Warehouses</span>
          </a>
        </li>
        <li>
          <a class="dropdown">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Submenus</span>
            <span class="icon"><i class="mdi mdi-plus"></i></span>
          </a>
          <ul>
            <li>
              <a href="#void">
                <span>Sub-item One</span>
              </a>
            </li>
            <li>
              <a href="#void">
                <span>Sub-item Two</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <p class="menu-label">User</p>
      <ul class="menu-list">
        <li class="{{ request()->is('create/staff') ? 'active' : '' }}">
            <a href="/create/staff">
                <span class="icon"><i class="mdi mdi-account-plus"></i></span>
                <span class="menu-item-label">Create Staff</span>
            </a>
        </li>
        <li class="{{ request()->is('staff') ? 'active' : '' }}">
            <a href="/staff">
                <span class="icon"><i class="mdi mdi-account-group"></i></span>
                <span class="menu-item-label">Staff</span>
            </a>
        </li>
        <li class="{{ request()->is('proffile') ? 'active' : '' }}">
            <a href="/proffile">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span class="menu-item-label">Proffile</span>
            </a>
        </li>
      </ul>
    </div>
  </aside>
