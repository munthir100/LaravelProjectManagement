<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="/" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
                        </span>
                    </a>

                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </div>

            <div class="d-flex align-items-center">


                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="{{ __('Search ...') }}" aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img id="header-lang-img" src="{{ asset('assets/images/flags/' . (app()->getLocale() == 'ar' ? 'sa' : 'us') . '.svg') }}" alt="{{ __('Header Language') }}" height="20" class="rounded">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item - English -->
                        @if(app()->getLocale() == 'ar')
                        <a href="#" onclick="document.getElementById('enForm').submit()" class="dropdown-item notify-item language py-2" data-lang="en" title="{{ __('English') }}">
                            <img src="{{ asset('assets/images/flags/us.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">{{ __('English') }}</span>
                        </a>
                        @else
                        <!-- item - Arabic -->
                        <a href="#" onclick="document.getElementById('arForm').submit()" class="dropdown-item notify-item language" data-lang="ar" title="{{ __('Arabic') }}">
                            <img src="{{ asset('assets/images/flags/ae.svg') }}" alt="user-image" class="me-2 rounded" height="18">
                            <span class="align-middle">{{ __('Arabic') }}</span>
                        </a>
                        @endif
                    </div>
                </div>




                <div class="ms-1 header-item d-sm-flex">
                    <a data-bs-toggle="modal" data-bs-target="#createProject" class="btn btn-primary btn-label rounded-pill">
                        <i class="ri-add-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                        {{ __('Project') }}
                    </a>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="/assets/images/users/user-dummy-img.jpg" alt="{{ __('Header Avatar') }}">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{request()->user('account')->name}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{request()->user('account')->email}}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">{{request()->user('account')->name}}</h6>
                        <a class="dropdown-item" href="{{ route('account.settings') }}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Profile') }}</span></a>
                        <a class="dropdown-item" href="{{ route('account.projects.index') }}"><i class=" ri-briefcase-5-line text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Projects') }}</span></a>
                        <a class="dropdown-item" href="{{ route('account.tasks.index') }}"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Tasks') }}</span></a>
                        <a class="dropdown-item" href="{{ route('account.settings') }}"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Settings') }}</span></a>
                        <a class="dropdown-item" href="{{ route('account.security') }}"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Security') }}</span></a>
                        <button class="dropdown-item" onclick="logout()" href="#"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="{{ __('Logout') }}">{{ __('Logout') }}</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="modal fade" id="createProject" tabindex="-1" aria-labelledby="createProjectLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sidebar-span">{{ __('Add Project') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('account.projects.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="number_of_team_members" class="form-label">{{ __('Number of Team Members') }}</label>
                            <input type="number" name="number_of_team_members" id="number_of_team_members" class="form-control @error('number_of_team_members') is-invalid @enderror" value="{{ old('number_of_team_members') }}" required>
                            @error('number_of_team_members')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="deadline" class="form-label">{{ __('Deadline') }}</label>
                            <input type="datetime-local" name="deadline" id="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline') }}" required>
                            @error('deadline')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="short_description" class="form-label">{{ __('Short Description') }}</label>
                            <input type="text" name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description') }}" required>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form type="hidden" class="d-none" action="{{ route('changeLocale') }}" method="post" id="arForm">
            @csrf
            <input type="text" name="lang" value="ar" required />
        </form>
        <form type="hidden" class="d-none" action="{{ route('changeLocale') }}" method="post" id="enForm">
            @csrf
            <input type="text" name="lang" value="en" required />
        </form>
    </div>
</div>
<form action="{{ route('account.logout') }}" id="logoutForm" method="post" class="hidden">
    @csrf
</form>
<script>
    function logout() {
        document.getElementById('logoutForm').submit();
    }
</script>