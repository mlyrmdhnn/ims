@php
    $totalNotif = $notif->where('isRead', 0)->count();
@endphp


<nav id="navbar-main" class="navbar is-fixed-top text-white warna-header">
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
            <a href="proffile" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-cog"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-email"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
          </div>
        </div>

        <form action="logout" method="POST">
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
        <li class="{{ request()->is('staff/inbox') ? 'active' : '' }}">
            <a href="staff/inbox">
                <span class="icon"><span class="w-5 h-5 mdi mdi-inbox"></span></span>
                <span class="menu-item-label">Inbox <span class="text-red-500">{{ $totalNotif > 9 ? '9+' : ($totalNotif > 0 ? $totalNotif : '') }}</span></span>
            </a>
        </li>
      </ul>
      <p class="menu-label">Examples</p>
      <ul class="menu-list">
        <li class="{{ request()->is('client/request/*') ? 'active' : '' }}">
            <a class="dropdown">
              <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
              <span class="menu-item-label">Request</span>
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </a>
            <ul>
              <li>
                <a href="client/request/stockin">
                  <span>Stock In</span>
                </a>
              </li>
              <li>
                <a href="client/request/stockout">
                  <span>Stock Out</span>
                </a>
              </li>
            </ul>
          </li>
        <li class="{{ request()->is('client/history/*') ? 'active' : '' }}">
            <a class="dropdown">
              <span class="icon"><i class="mdi mdi-history"></i></span>
              <span class="menu-item-label">History</span>
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </a>
            <ul>
              <li>
                <a href="client/history/request">
                  <span>Request</span>
                </a>
              </li>
              <li>
                <a href="client/history/transaction">
                  <span>Transaction</span>
                </a>
              </li>
            </ul>
          </li>
         <li class="{{ request()->is('client/transaction') ? 'active' : '' }}">
          <a href="client/transaction">
            <span class="icon"><i class="mdi mdi-cash"></i></span>
            <span class="menu-item-label">Transaction</span>
          </a>
        </li>


        <li class="{{ request()->is('staff/items') ? 'active' : '' }}">
            <a href="staff/items">
              <span class="icon"><i class="mdi mdi-invoice-list-outline"></i></span>
              <span class="menu-item-label">Items</span>
            </a>
          </li>

      </ul>
      <p class="menu-label">User</p>
      <ul class="menu-list">
        <li class="{{ request()->is('proffile') ? 'active' : '' }}">
            <a href="proffile">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                <span class="menu-item-label">Proffile</span>
            </a>
        </li>
      </ul>
    </div>
  </aside>
