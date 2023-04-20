<aside class="left-nav left-nav left-nav--open">

    {{-- nav header --}}
    <div class="nav-header ">
        {{-- <a href="{{ route('home') }}" class="flex justify-start items-center" tabindex="-1"> --}}
        <div class="nav-logo w-full h-full px-3">
            <img src="{{ asset('img/logo.png') }}" style="width:40px;height:40px;margin-inline: auto;" alt="logo">
        </div>
        </a>
        <div class="nav-state-container flex justify-end items-center w-full h-full">
            <div class="nav-state">
                @if (App::isLocale('en'))
                    <i class="fas fa-arrow-alt-to-right"></i>
                @endif
                @if (!App::isLocale('en'))
                    <i class="fas fa-arrow-alt-from-right"></i>
                @endif
            </div>
        </div>
    </div>
    {{-- nav body --}}
    <div class="nav-body w-full">
        <ul class="list">
            {{-- list links --}}


            {{-- <li class="list-item">
                <div class="item-container" tabindex="0">
                    <div class="item-icon">
                        <i class="fas fa-pager"></i>
                    </div>
                    <div class="item-link item__link--extend">
                        <span>سەرەتا</span>
                    </div>
                </div>
                <ul class="list__extend">
                    <li class="list__item--extend">
                        <a href="{{ route('home') }}" tabindex="-1">
                            <div class="item-container" tabindex="0">
                                <div class="item-icon">
                                    <i class="fas fa-home-lg-alt"></i>
                                </div>
                                <div class="item-link">
                                    <span>{{ __('index.admin.nav.dashboard') }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list__item--extend">
                        <a href="{{ route('car.index') }}" tabindex="-1">
                            <div class="item-container" tabindex="0">
                                <div class="item-icon">
                                    <i class="fas fa-car-side"></i>
                                </div>
                                <div class="item-link">
                                    <span>{{ __('index.admin.nav.car.title') }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list__item--extend">
                        <a href="{{ route('expense.index') }}" tabindex="-1">
                            <div class="item-container" tabindex="0">
                                <div class="item-icon">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="item-link">
                                    <span>{{ __('index.admin.nav.expense.title') }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list__item--extend">
                        <a href="{{ route('capital.create') }}" tabindex="-1">
                            <div class="item-container" tabindex="0">
                                <div class="item-icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div class="item-link">
                                    <span>{{ __('index.admin.nav.capital.title') }}</span>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </li> --}}


            {{-- <li class="list-item"> --}}
            {{-- <div class="item-container" tabindex="0">
                    <div class="item-icon">
                        <i class="fas fa-pager"></i>
                    </div>
                    <div class="item-link item__link--extend">
                        <span>_</span>
                    </div>
                </div> --}}
            {{-- <ul class="list__extend"> --}}
            <li class="list__item--extend">
                <a href="{{ route('home') }}" tabindex="-1">
                    <div class="item-container" tabindex="0">
                        <div class="item-icon">
                            <i class="fas fa-home-lg-alt"></i>
                        </div>
                        <div class="item-link">
                            <span>{{ __('index.admin.nav.dashboard') }}</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list__item--extend">
                <a href="{{ route('car.index') }}" tabindex="-1">
                    <div class="item-container" tabindex="0">
                        <div class="item-icon">
                            <i class="fas fa-car-side"></i>
                        </div>
                        <div class="item-link">
                            <span>{{ __('index.admin.nav.car.title') }}</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list__item--extend">
                <a href="{{ route('expense.index') }}" tabindex="-1">
                    <div class="item-container" tabindex="0">
                        <div class="item-icon">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>
                        <div class="item-link">
                            <span>{{ __('index.admin.nav.expense.title') }}</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="list__item--extend">
                <a href="{{ route('capital.create') }}" tabindex="-1">
                    <div class="item-container" tabindex="0">
                        <div class="item-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="item-link">
                            <span>{{ __('index.admin.nav.capital.title') }}</span>
                        </div>
                    </div>
                </a>
            </li>
            {{-- </ul> --}}
            {{-- </li> --}}
        </ul>
    </div>

    {{-- nav footer --}}
    <div class="nav-footer w-full mt-auto">
        <ul class="list">

            {{-- user profile --}}
            <li class="list-item">
                <a href="{{ route('profile.manage') }}" tabindex="-1">
                    <div class="item-container" tabindex="0" role="button">
                        <div class="item-icon nav__profile-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="item-link nav-profile_name">
                            <span>{{ __('index.admin.nav.manage_users') }}</span>
                        </div>
                    </div>
                </a>
            </li>
            {{-- backup --}}
            <li class="list-item">
                <form action="{{ route('backup') }}" method="POST">
                    <div class="item-container flex" tabindex="0" role="button">
                        @csrf
                        <div class="item-icon nav__profile-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="item-link nav-profile_name">
                            <span>{{ __('index.admin.nav.backup') }}</span>
                        </div>
                    </div>
                </form>

            </li>
            {{-- user profile --}}
            <li class="list-item">
                {{-- <a href="{{ route('admin.profile.index') }}" tabindex="-1"> --}}
                <div class="item-container" tabindex="0" role="button">
                    <div class="item-icon nav__profile-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="item-link nav-profile_name">
                        <span>{{ auth()->user()->username }}</span>
                    </div>
                </div>
                </a>
            </li>
            <li class="list-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="item-container" tabindex="0">
                        <div class="item-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <div class="item-link">
                            <span>{{ __('index.admin.nav.logout') }}</span>
                        </div>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
