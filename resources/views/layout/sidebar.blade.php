<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link">
                <div class="user-wrapper">
                    @auth
                        @if (Auth::user()->avatar)
                            <div class="profile-image">
                                <img src="/avatars/{{ Auth::user()->avatar }}" alt="profile image">
                            </div>
                        @endif
                    @endauth
                    <div class="text-wrapper">
                        @auth
                            <p class="profile-name">{{ Auth::user()->name }}</p>
                            <div class="dropdown" data-display="static">
                                <a href="#" class="nav-link d-flex user-switch-dropdown-toggler"
                                    id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <small class="designation text-muted">Store Warehouse Management</small>
                                    <span class="status-indicator online"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                                    <a class="dropdown-item mt-2" href="{{ route('profile.index') }}"> Manage Accounts </a>
                                    <a class="dropdown-item" href="{{ route('profile.change-password') }}"> Change Password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form2').submit();">
                                        Sign Out </a>
                                </div>
                                <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endauth

                    </div>
                </div>
                @canany(['upload-sampling'])
                <button class="btn btn-success btn-block">Upload All Data Report <i class="mdi mdi-plus"></i>
                </button>
                @endcanany
            </div>
        </li>
        @canany(['view-dashboard'])
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard All Report</span>
            </a>
        </li>
        @endcanany
        @canany(['view-data-report'])
        <li class="nav-item {{ active_class(['basic-ui/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui"
                aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="basic-ui">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Detail Data Repots</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['basic-ui/*']) }}" id="basic-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/buttons') }}">Summary Stock Opname Store</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/dropdowns') }}">Accuracy WMS vs NAV</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Accuracy by Location WMS</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Corecction Receiving</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Accuracy Putaway</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Stock Minus</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Report Breakage</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui/typography') }}">Report Failed Transfer</a>
                    </li>
                </ul>
            </div>
        </li>
        @endcanany
        
        @canany(['view-cycle-count'])
        <li class="nav-item {{ active_class(['cycle_counts/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#cycle_counts"
                aria-expanded="{{ is_active_route(['cycle_counts/*']) }}" aria-controls="cycle_counts">
                <i class="menu-icon mdi mdi-sync-alert"></i>
                <span class="menu-title">Cycle Count</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['cycle_counts/*']) }}" id="cycle_counts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['cycle_counts/create']) }}">
                        <a class="nav-link" href="{{ route('cycle_counts.create') }}">Upload Data Cycle Count</a>
                    </li>
                    <li class="nav-item {{ active_class(['cycle_counts/index']) }}">
                        <a class="nav-link" href="{{ route('cycle_counts.index') }}">View Data Cycle Count</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui2/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui2/typography') }}">Progress Cycle Count</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui2/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui2/typography') }}">Report Cycle Count</a>
                    </li>
                </ul>
            </div>
        </li>
        @endcanany

        @canany(['view-sampling'])
        <li class="nav-item {{ active_class(['samplings/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#samplings"
                aria-expanded="{{ is_active_route(['samplings/*']) }}" aria-controls="samplings">
                <i class="menu-icon mdi mdi-bookmark"></i>
                <span class="menu-title">Sampling</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['samplings/*']) }}" id="samplings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['samplings/create']) }}">
                        <a class="nav-link" href="{{ route('samplings.create') }}">Upload Data Sampling</a>
                    </li>
                    <li class="nav-item {{ active_class(['samplings/index']) }}">
                        <a class="nav-link" href="{{ url('samplings.index') }}">View Data Upload Sampling</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui3/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui3/typography') }}">Progress Sampling</a>
                    </li>
                    <li class="nav-item {{ active_class(['basic-ui3/typography']) }}">
                        <a class="nav-link" href="{{ url('/basic-ui3/typography') }}">Report Sampling</a>
                    </li>
                </ul>
            </div>
        </li>
        @endcanany

        @canany(['view-form_trs', 'create-form_trs', 'update-form_trs', 'delete-form_trs'])
        <li class="nav-item {{ active_class(['form_trs/*']) }}">
            <a class="nav-link" href="{{ route('form_trs.index') }}">
                <i class="menu-icon mdi mdi-plus-box"></i>
                <span class="menu-title">Form Req TR</span>
            </a>
        </li>
        @endcanany

        @canany(['view-crumen'])
        <li class="nav-item {{ active_class(['crumens/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#crumen"
                aria-expanded="{{ is_active_route(['basic-ui3/*']) }}" aria-controls="crumen">
                <i class="menu-icon mdi mdi-qrcode"></i>
                <span class="menu-title">CRUMEN</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['basic-ui4/*']) }}" id="crumen">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['mutasi_tag_bins']) }}">
                        <a class="nav-link" href="{{ url('mutasi_tag_bins') }}">Cetak Barcode Lokasi</a>
                    </li>
                    <li class="nav-item {{ active_class(['mutasi_cws']) }}">
                        <a class="nav-link" href="{{ url('mutasi_cws') }}">Cetak Mutasi Tagbin C/W</a>
                    </li>
                    <li class="nav-item {{ active_class(['mutasi_ds']) }}">
                        <a class="nav-link" href="{{ url('mutasi_ds') }}">Cetak Mutasi Tagbin D</a>
                    </li>
                    <li class="nav-item {{ active_class(['crystal_reports']) }}">
                        <a class="nav-link" href="{{ url('crystal_reports') }}">Cetak Crystal Report</a>
                    </li>
                </ul>
            </div>
        </li>
        @endcanany

        @canany(['create-user', 'edit-user', 'delete-role'])
        <li class="nav-item {{ active_class(['users']) }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">All Data Users</span>
            </a>
        </li>
        @endcanany

        @canany(['create-store', 'edit-store', 'delete-store'])
        <li class="nav-item {{ active_class(['stores']) }}">
            <a class="nav-link" href="{{ route('stores.index') }}">
                <i class="menu-icon mdi mdi-store"></i>
                <span class="menu-title">Store</span>
            </a>
        </li>
        @endcanany

        @canany(['create-role', 'edit-role', 'delete-role'])
        <li class="nav-item {{ is_active_route(['roles']) }}">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="menu-icon mdi mdi-key"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        @endcanany

        @canany(['view-items', 'create-items', 'update-items', 'delete-items'])
        <li class="nav-item {{ is_active_route(['items']) }}">
            <a class="nav-link" href="{{ route('items.index') }}">
                <i class="menu-icon mdi mdi-package"></i>
                <span class="menu-title">Items</span>
            </a>
        </li>
        @endcanany

        @canany(['view-backup'])
        <li class="nav-item">
            <a class="nav-link">
                <i class="menu-icon mdi mdi-history"></i>
                <span class="menu-title">History, Backup & Export</span>
            </a>
        </li>
        @endcanany

        @canany(['create-video', 'edit-video', 'delete-video', 'create-letyouknow', 'edit-letyouknow', 'delete-letyouknow'])
        <li class="nav-item {{ active_class(['basic-ui5/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui5"
                aria-expanded="{{ is_active_route(['basic-ui3/*']) }}" aria-controls="basic-ui5">
                <i class="menu-icon mdi mdi-plus-box"></i>
                <span class="menu-title">Other Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['basic-ui5/*']) }}" id="basic-ui5">
                <ul class="nav flex-column sub-menu">
                    @canany(['create-letyouknow', 'edit-letyouknow', 'delete-letyouknow'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faqs.create') }}">Data Let You Know</a>
                    </li>
                    @endcanany
                    @canany(['create-video', 'edit-video', 'delete-video'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('videos.create') }}">Data Leaning by Video</a>
                    </li>
                    @endcanany
                </ul>
            </div>
        </li>
        @endcanany
        
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/faqs') }}">
                <i class="menu-icon mdi mdi-comment-question-outline"></i>
                <span class="menu-title">Let You Know</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/videos') }}">
                <i class="menu-icon mdi mdi-video"></i>
                <span class="menu-title">Leaning by Video</span>
            </a>
        </li>
    </ul>
</nav>
