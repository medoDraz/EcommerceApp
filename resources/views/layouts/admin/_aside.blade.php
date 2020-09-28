<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @if(Route::current()->getName() == 'admin.welcome') active @endif"><a
                    href="{{route('admin.welcome')}}"><i class="la la-home"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main"> @lang('site.dashboard') </span></a>
            </li>

            @if (auth()->user()->hasPermission('users_read'))
                <li class="nav-item @if(Request::is('admin/users*')) open @endif"><a href=""><i
                            class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.admins') </span>
                        <span
                            class="badge badge badge-info badge-pill float-right mr-2">{{App\User::whereRoleIs('admin')->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(Route::current()->getName() == 'admin.users.index') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.users.index')}}"
                               data-i18n="nav.dash.ecommerce">@lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('users_create'))
                            <li class="@if(Route::current()->getName() == 'admin.users.create') active @endif">
                                <a class="menu-item " href="{{route('admin.users.create')}}"
                                   data-i18n="nav.dash.crypto"> @lang('site.add_admin')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (auth()->user()->hasPermission('categories_read'))
                <li class="nav-item @if(Request::is('admin/categories*')) open @endif"><a href=""><i
                            class="la la-book"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.categories') </span>
                        <span
                            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Category::defaultCategory()->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(Route::current()->getName() == 'admin.categories.index') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.categories.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('categories_create'))
                            <li class="@if(Route::current()->getName() == 'admin.categories.create') active @endif">
                                <a class="menu-item" href="{{route('admin.categories.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_category')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('sub_categories_read'))
                <li class="nav-item @if(Request::is('admin/subcategories*')) open @endif"><a href=""><i
                            class="la la-book"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.sub_categories') </span>
                        <span
                            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Category::subCategory()->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(Route::current()->getName() == 'admin.subcategories.index') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.subcategories.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('sub_categories_create'))
                            <li class="@if(Route::current()->getName() == 'admin.subcategories.create') active @endif">
                                <a class="menu-item" href="{{route('admin.subcategories.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_sub_category')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('products_read'))
                <li class="nav-item @if(Request::is('admin/products*')) open @endif"><a href=""><i
                            class="icon-bag"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.products') </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Product::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(Route::current()->getName() == 'admin.products.index') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.products.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('products_create'))
                            <li class="@if(Route::current()->getName() == 'admin.products.create') active @endif">
                                <a class="menu-item" href="{{route('admin.products.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_product')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('tags_read'))
                <li class="nav-item @if(Request::is('admin/tags*')) open @endif"><a href=""><i
                            class="la la-tags"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.tags') </span>
                        <span
                            class="badge badge badge-warning  badge-pill float-right mr-2">{{App\Tag::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="@if(Route::current()->getName() == 'admin.tags.index') active @endif">
                            <a class="menu-item"
                               href="{{route('admin.tags.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('tags_create'))
                            <li class="@if(Route::current()->getName() == 'admin.tags.create') active @endif">
                                <a class="menu-item" href="{{route('admin.tags.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_tag')</a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('clients_read'))
                <li class="nav-item @if(Route::current()->getName() == 'admin.clients.index') active @endif"><a href="{{route('admin.clients.index')}}"><i
                            class="la la-tags"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.clients') </span>
                        <span
                            class="badge badge badge-warning  badge-pill float-right mr-2">{{App\Client::count()}}</span>
                    </a>
{{--                    <ul class="menu-content">--}}
{{--                        <li class="@if(Route::current()->getName() == 'admin.tags.index') active @endif">--}}
{{--                            <a class="menu-item"--}}
{{--                               href="{{route('admin.tags.index')}}"--}}
{{--                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>--}}
{{--                        </li>--}}
{{--                        @if (auth()->user()->hasPermission('tags_create'))--}}
{{--                            <li class="@if(Route::current()->getName() == 'admin.tags.create') active @endif">--}}
{{--                                <a class="menu-item" href="{{route('admin.tags.create')}}"--}}
{{--                                   data-i18n="nav.dash.crypto">@lang('site.add_tag')</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}

{{--                    </ul>--}}
                </li>
            @endif


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
