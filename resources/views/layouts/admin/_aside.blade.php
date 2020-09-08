<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item @if(request()->segment(1) == 'admin') active @endif"><a
                    href="{{route('admin.welcome')}}"><i class="la la-home"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main"> @lang('site.dashboard') </span></a>
            </li>

            @if (auth()->user()->hasPermission('users_read'))
                <li class="nav-item @if(request()->segment(2) == 'users') active @endif"><a href=""><i
                            class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.admins') </span>
                        <span
                            class="badge badge badge-info badge-pill float-right mr-2">{{App\User::whereRoleIs('admin')->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(request()->segment(3) == 'users') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.users.index')}}"
                               data-i18n="nav.dash.ecommerce"> {{request()->segment(2)}} @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('users_create'))
                            <li><a class="menu-item" href="{{route('admin.users.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_admin')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (auth()->user()->hasPermission('categories_read'))
                <li class="nav-item @if(request()->segment(2) == 'categories') active @endif"><a href=""><i
                            class="la la-book"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.categories') </span>
                        <span
                            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Category::defaultCategory()->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(request()->segment(2) == 'categories') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.categories.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('categories_create'))
                            <li><a class="menu-item" href="{{route('admin.categories.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_category')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('sub_categories_read'))
                <li class="nav-item @if(request()->segment(2) == 'subcategories') active @endif"><a href=""><i
                            class="la la-book"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.sub_categories') </span>
                        <span
                            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Category::subCategory()->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(request()->segment(2) == 'subcategories') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.subcategories.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('sub_categories_create'))
                            <li><a class="menu-item" href="{{route('admin.subcategories.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_sub_category')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('products_read'))
                <li class="nav-item @if(request()->segment(2) == 'products') active @endif"><a href=""><i
                            class="la la-male"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.products') </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Product::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(request()->segment(2) == 'products') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.products.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('products_create'))
                            <li><a class="menu-item" href="{{route('admin.products.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_product')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--            --}}{{--            @if (auth()->user()->hasPermission('admins_read'))--}}
            {{--            <li class="nav-item @if(request()->segment(2) == 'admins') active @endif"><a href=""><i--}}
            {{--                        class="la la-group"></i>--}}
            {{--                    <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.admins') </span>--}}
            {{--                    <span--}}
            {{--                        class="badge badge badge-warning  badge-pill float-right mr-2"></span>--}}
            {{--                </a>--}}
            {{--                <ul class="menu-content">--}}
            {{--                    <li class="@if(request()->segment(2) == 'admins') active @endif">--}}
            {{--                        <a class="menu-item"--}}
            {{--                           href="{{route('admin.admins.index')}}"--}}
            {{--                           data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>--}}
            {{--                    </li>--}}
            {{--                    --}}{{--                        @if (auth()->user()->hasPermission('admins_create'))--}}
            {{--                    <li><a class="menu-item" href="{{route('admin.admins.create')}}"--}}
            {{--                           data-i18n="nav.dash.crypto">@lang('site.add_admin')</a>--}}
            {{--                    </li>--}}
            {{--                    --}}{{--                        @endif--}}

            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            @endif--}}


            {{--            <li class="nav-item">--}}
            {{--                <a href=""><i class="la la-male"></i>--}}
            {{--                    <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات   </span>--}}
            {{--                    <span--}}
            {{--                        class="badge badge badge-danger  badge-pill float-right mr-2">0</span>--}}
            {{--                </a>--}}
            {{--                <ul class="menu-content">--}}
            {{--                    <li class="active"><a class="menu-item" href=""--}}
            {{--                                          data-i18n="nav.dash.ecommerce"> تذاكر الطلاب </a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}

        </ul>
    </div>
</div>
