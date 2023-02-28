<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        @if (Auth::check() && Auth::user()->roles == 'SUPER_ADMIN')
            <!-- Sidebar super admin-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="{{ route('super-admin-dashboard') }}"
                            aria-expanded="false">
                            <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                            <i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item">
                                <a href="{{ route('invitation.index') }}" class="sidebar-link">
                                    <span class="hide-menu">Data Model Undangan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('admin.index') }}" class="sidebar-link">
                                    <span class="hide-menu"> Data Admin</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('customer.index') }}" class="sidebar-link">
                                    <span class="hide-menu"> Data Kustomer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="{{ route('transaction.index') }}" aria-expanded="false">
                            <i data-feather="shopping-bag" class="feather-icon"></i>
                            <span class="hide-menu">Transaction</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="#" aria-expanded="false">
                            <i data-feather="clipboard" class="feather-icon"></i>
                            <span class="hide-menu">Penugasan</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="#" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu">Laporan Bulanan</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="javascript:void(0)" id="logout"
                            aria-expanded="false">
                            <i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                </ul>
            </nav>
            <!-- End Sidebar super admin -->
        @elseif (Auth::check() && Auth::user()->roles == 'ADMIN')
            {{-- Side bar admin --}}
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="{{ route('admin-dashboard') }}" aria-expanded="false">
                            <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item">
                                <a href="{{ route('admin-invitation-index') }}" class="sidebar-link">
                                    <span class="hide-menu"> Data Model Undangan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('data-admin-index') }}" class="sidebar-link">
                                    <span class="hide-menu"> Data Admin</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="#" aria-expanded="false">
                            <i data-feather="settings" class="feather-icon"></i>
                            <span class="hide-menu">Pengerjaan Undangan</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                </ul>
            </nav>
        @endif
    </div>
    <!-- End Sidebar scroll-->
</aside>
