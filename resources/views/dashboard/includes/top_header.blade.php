<div class="header py-4">
    <div class="container">
        <div class="d-flex">

        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown">
            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
{{--                <span class="avatar" style="background-image: url({{url(auth()->user()->avatar)}})"></span>--}}
                <span class="ml-2 d-none d-lg-block">
                <span class="text-default">{{auth()->user()->full_name}}</span>
                <small class="text-muted d-block mt-1">@if(\Lang::has("dashboard.roles.".auth()->user()->roles[0]->name)) {{__('dashboard.roles.'.auth()->user()->roles[0]->name)}} @else {{auth()->user()->roles[0]->name}} @endif</small>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item {{active(['profile.index'])}}" href="{{route('profile.index')}}">
                <i class="dropdown-icon fe fe-user"></i> @lang('dashboard.top_header.profile')
                </a>
                @can('managment_site_messages')
                <a class="dropdown-item {{active('messages.index')}}" href="{{route('messages.index')}}">
                    <i class="dropdown-icon fe fe-mail"></i> @lang('global.inbox')
                </a>
                @endcan
                <div class="dropdown-divider"></div>
                @can('managment_settings')
                <a class="dropdown-item {{active('settings.index')}}" href="{{route('settings.index')}}">
                    <i class="dropdown-icon fe fe-settings"></i> @lang('dashboard.top_header.settings')
                </a>
                @endcan
                <a class="dropdown-item" target="_blank" href="{{route('front.index')}}">
                        <i class="dropdown-icon fe fe-home"></i> @lang('dashboard.top_header.home_page')
                    </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="dropdown-icon fe fe-log-out"></i> @lang('dashboard.top_header.logout')
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </div>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
            <span class="header-toggler-icon"></span>
        </a>
        </div>
    </div>
</div>
