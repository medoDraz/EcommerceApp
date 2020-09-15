<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<?php $url2=$_SERVER['REQUEST_URI']; ?>
<!--            --><?php //if(strpos($url2,"admin")!==false ){echo "active" ;}  ?>
            <li class="nav-item "><a
                    href="{{route('admin.welcome')}}"><i class="la la-home"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main"> @lang('site.dashboard') </span></a>
            </li>

            @if (auth()->user()->hasPermission('users_read'))
                <li class="nav-item "><a href=""><i
                            class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.admins') </span>
                        <span
                            class="badge badge badge-info badge-pill float-right mr-2">{{App\User::whereRoleIs('admin')->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if(strpos($url2,"users")!==false ){echo "active" ;}  ?>">
                            <a class="menu-item"
                               href="{{route('admin.users.index')}}"
                               data-i18n="nav.dash.ecommerce">@lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('users_create'))
                            <li class="<?php if(strpos($url2,"users")!==false&&strpos($url2,"create")!==false ){echo "active" ;}  ?>">
                                <a class="menu-item <?php if(strpos($url2,"users")!==false &&strpos($url2,"users/create")!==false ){echo "active" ;}  ?>" href="{{route('admin.users.create')}}"
                                   data-i18n="nav.dash.crypto"> @lang('site.add_admin')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (auth()->user()->hasPermission('categories_read'))
                <li class="nav-item "><a href=""><i
                            class="la la-book"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.categories') </span>
                        <span
                            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Category::defaultCategory()->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if(strpos($url2,"categories")!==false ){echo "active" ;}  ?>">
                            <a class="menu-item"
                               href="{{route('admin.categories.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('categories_create'))
                            <li class="<?php if(strpos($url2,"categories")!==false&&strpos($url2,"create")!==false ){echo "active" ;}  ?>">
                                <a class="menu-item" href="{{route('admin.categories.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_category')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('sub_categories_read'))
                <li class="nav-item "><a href=""><i
                            class="la la-book"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.sub_categories') </span>
                        <span
                            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Category::subCategory()->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if(strpos($url2,"subcategories")!==false ){echo "active" ;}  ?>">
                            <a class="menu-item"
                               href="{{route('admin.subcategories.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('sub_categories_create'))
                            <li class="<?php if(strpos($url2,"subcategories")!==false&&strpos($url2,"create")!==false ){echo "active" ;}  ?>">
                                <a class="menu-item" href="{{route('admin.subcategories.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_sub_category')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('products_read'))
                <li class="nav-item "><a href=""><i
                            class="icon-bag"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.products') </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Product::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if(strpos($url2,"products")!==false ){echo "active" ;}  ?>">
                            <a class="menu-item"
                               href="{{route('admin.products.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('products_create'))
                            <li class="<?php if(strpos($url2,"products")!==false&&strpos($url2,"create")!==false ){echo "active" ;}  ?>">
                                <a class="menu-item" href="{{route('admin.products.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_product')</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (auth()->user()->hasPermission('tags_read'))
                <li class="nav-item "><a href=""><i
                            class="la la-tags"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> @lang('site.tags') </span>
                        <span
                            class="badge badge badge-warning  badge-pill float-right mr-2">{{App\Tag::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if(strpos($url2,"tags")!==false ){echo "active" ;}  ?>">
                            <a class="menu-item"
                               href="{{route('admin.tags.index')}}"
                               data-i18n="nav.dash.ecommerce"> @lang('site.show_all') </a>
                        </li>
                        @if (auth()->user()->hasPermission('tags_create'))
                            <li class="<?php if(strpos($url2,"tags")!==false&&strpos($url2,"create")!==false ){echo "active" ;}  ?>">
                                <a class="menu-item" href="{{route('admin.tags.create')}}"
                                   data-i18n="nav.dash.crypto">@lang('site.add_tag')</a>
                            </li>
                        @endif

                    </ul>
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
