<!-- Page Sidebar Start-->
<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>
        <img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom">
            <span class="badge badge-primary">New</span>
        </div>
        <a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{auth()->guard('admin')->user()->name}}</h6>
        </a>
    </div>

    <nav>
        <div class="main-navbar @if(Route::current()->getName() == 'admin.pos') close_icon @endif">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>{{ __('main.Main_List') }} </h6>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav @if(Route::current()->getName() == 'admin.dashboard') active @endif" href="{{route('admin.dashboard')}}">
                            <i data-feather="home"></i>
                            <span>{{ __('main.home') }}</span>
                        </a>
                    </li>


                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="package"></i>
                            <span> {{ __('main.Products_Data') }}</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.products') active @endif" href="{{route('admin.products')}}"><span>{{ __('main.Products') }}</span></a>
                            </li>
                            <li>
                                <a class="@if(Route::current()->getName() == 'categories') active @endif" href="{{route('categories')}}"><span>{{ __('main.Categories') }} </span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="percent"></i><span>{{ __('main.Coupons_And_Offers') }} </span></a>
                        <ul class="nav-submenu menu-content">

                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.flash.deals') active @endif" href="{{route('admin.flash.deals')}}"><span> {{ __('main.Rabid_Offers') }}</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="info"></i><span>{{ __('main.Site_Data') }} </span></a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.about') active @endif" href="{{route('admin.about')}}"><span>About</span></a>
                            </li>

                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.counter') active @endif" href="{{route('admin.counter')}}"><span>counter</span></a>
                            </li>

                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.slides') active @endif" href="{{route('admin.slides')}}"><span>{{ __('main.Slides') }}</span></a>
                            </li>



                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.setting.contact') active @endif" href="{{route('contact.index')}}"><span>{{ __('main.Contact_Settings') }}</span></a>
                            </li>
                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.setting') active @endif" href="{{route('admin.setting')}}"><span>{{ __('main.General_Settings') }} </span></a>
                            </li>
                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.contact') active @endif" href="{{route('contact.index')}}"><span>{{ __('main.Contact_Us') }} </span></a>
                            </li>

                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.newsletter') active @endif" href="{{route('admin.newsletter')}}"><span>Newsletter </span></a>
                            </li>
                            <li>
                                <a class="@if(Route::current()->getName() == 'admin.review') active @endif" href="{{route('admin.review')}}"><span>Review </span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav @if(Route::current()->getName() == 'admins') active @endif" href="{{route('admins')}}"><i data-feather="settings"></i><span>{{ __('main.Admins') }}</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav @if(Route::current()->getName() == 'users') active @endif" href="{{route('users')}}"><i data-feather="users"></i><span>{{ __('main.Users') }}</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav @if(Route::current()->getName() == 'admin.pages') active @endif" href="{{route('admin.pages')}}"><i data-feather="layout"></i><span>{{ __('main.Pages') }}</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav @if(Route::current()->getName() == 'admin.orders') active @endif" href="{{route('admin.orders')}}"><i data-feather="shopping-cart"></i><span>{{ __('main.Orders') }}</span></a>
                    </li>

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </div>
    </nav>
</header>
<!-- Page Sidebar Ends-->