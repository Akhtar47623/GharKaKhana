<style type="text/css">
    span.counts {
        background: #1c3e7f;
        color: #fff;
        margin-left: 8px;
        padding: 1px 8px;
        border-radius: 7px;
        float: right;
    }
</style>
<?php

// $homepage_slider = App\model\Slider::where('page_name','HomePage')->count();
// $home_page_count = App\model\CMS::where('page_name','Home Page')->count();
// $about_count = App\model\CMS::where('page_name','About Us')->count();
// $contact_count = App\model\CMS::where('page_name','Contact Us')->count();
// $coaching_detail = App\model\CMS::where('page_name','Coaching Detail')->count();
// $service_count = App\model\CMS::where('page_section','Services')->count();
// $counter_count = App\model\CMS::where('page_name','Counter')->count();
// $development_count = App\model\CMS::where('page_name','Development')->count();
// $events_count = App\model\CMS::where('page_name','Events')->count();


?>

<aside class="left-sidebar">
    <ul class="nav-bar  @if(!auth()->check()) d-none @endif navbar-inverse hidden-xs-down">
    </ul>
    <div class="scroll-sidebar">
        @if(auth()->check())
        <nav class="sidebar-nav ">
            <ul id="sidebarnav">
                {{-- @if(auth()->user()->hasRole('admin')) --}}
                <li class="clearfix"></li>
                <li class=""><a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fas fa-home"></i>
                    <span class="hide-menu">Home</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <i class="fa-solid fa-greater-than"></i><a href="{{url('admin')}}" class="">Dashboard</a></li>
                        <li><a href="{{ url('/') }}" target="_blank" class="">Visit Website</a></li>
                        <li><a href="{{url('admin/favicon')}}" class="">Favicon Management</a></li>
                        <li><a href="{{url('admin/banner')}}"><span class="hide-menu">Banner Management</span></a>
                       <!--  <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/main-banner')}}" class="">Main Banner</a></li>
                            <li><a href="{{url('admin/banner')}}" class="">Site Banners</a></li>
                        </ul> -->
                        </li>
                        <li><a href="{{url('admin/header-logo')}}"><span class="hide-menu">Logo Management</span></a></li>
                        </li>
                        <li><a href="{{url('admin/config')}}" class="">Config</a></li>
                    </ul>
                </li>

                <hr>
                <li class=""><a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fas fa-box"></i>
                    <span class="hide-menu">CMS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('dashboard')}}" class="has-arrow waves-effect waves-dark">Pages</a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/admin/homepage-content')}}" class="">Home Page <span class="counts"></span></a></li>
                                {{-- <li><a href="{{ url('/admin/about-us') }}" class="">About Us <span class="counts"><?= $about_count ?></span></a></li>
                                <li><a href="{{ url('/admin/contact-us') }}" class="">Contact Us <span class="counts"><?= $contact_count ?></span></a></li>
                                <li><a href="{{ url('/admin/events-content') }}" class="">Events <span class="counts"><?= $events_count ?></span></a></li> --}}

                            </ul>

                        </li>
{{--
                        <li><a href="{{ url('/admin/development-content') }}" class="">Development<span class="counts"><?= $development_count ?></span></a></li>
                        <li><a href="{{url('/admin/counter-content')}}"><i class="fa " aria-hidden="true"></i>Counter<span class="counts"><?= $counter_count ?></span></a></li> --}}

                    </ul>
                </li>
                <hr>
                 <li class=""><a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fas fa-sliders"></i>
                    <span class="hide-menu">Slider Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        {{-- <li><a href="{{ url('/admin/home-slider') }}" class="">Home <span class="counts"><?= $homepage_slider ?></span></a></li> --}}
                    </li>
                    </ul>
                </li>
                <hr>
                <li><a href="{{url('admin/services')}}"><i class="fa fa-cogs" aria-hidden="true"></i><span class="hide-menu">Services</span></a></li>
                 <hr>
                <li><a href="{{url('admin/event')}}"><i class="fas fa-users"></i><span class="hide-menu">Events Management</span></a></li>
                <hr>
                <li><a href="{{url('admin/help-us')}}"><i class="fas fa-people-carry"></i><span class="hide-menu">Help Us</span></a></li>
                <hr>
                 <li><a href="{{url('admin/donation')}}"><i class="fas fa-donate"></i><span class="hide-menu">Donations</span></a></li>
                <hr>
                <li><a href="{{url('admin/inquiry')}}"><i class="fa fa-envelope"></i></i><span class="hide-menu">Inquiry Management</span></a></li>

                <hr>
                <li><a href="{{url('admin/newsletters')}}"><i class="fa fa-user-plus"></i><span class="hide-menu">NewsLetter Management</span></a></li>
                <hr>
                <li><a href="{{url('/admin/account/profile')}}"><i class="fa fa-cog"></i><span class="hide-menu">Account Settings</span></a>
                </li>
                   @else
                <li><a href="{{ url('/') }}" target="_blank" class=""><i class="fa fa-globe" aria-hidden="true"></i><span class="hide-menu">Visit Website</span></a></li>
                <hr>
                <li><a href="{{url('/panel/user/fav-job')}}"><i class="fab fa-gratipay"></i><span class="hide-menu">Favorite List</span></a>
                <hr>
                <li><a href="{{url('/panel/user/account/profile')}}"><i class="fa fa-cog"></i><span class="hide-menu">Account Settings</span></a>
                    {{-- @endif --}}
                </li>
            </ul>
        </nav>
        @endif
    </div>
</aside>

