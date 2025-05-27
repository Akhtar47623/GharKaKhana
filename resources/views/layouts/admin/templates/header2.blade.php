<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');
    span.badge.bg-danger{
        border-radius: 10px;
        height: 16px;
        max-width: 15px;
        position: absolute;
        margin: 16px 0px 0px -12px;
        cursor: auto;
    }
    .topbar .top-navbar .navbar-nav>.nav-item>span {
    line-height: 15px;
    font-size: 14px;
    color: #ffffff;
    padding: 0px 9px 0px 3px;
     color: white;
 }
    li.far.fa-bell.mt-3{
        margin-left: 988px;
        font-size: 30px;
        vertical-align: middle;
        color: white;
        position: relative;
        display: inline-block;
    }
    .notification-text{
        width: 300px;
        padding-left: 10px;
    }
    /*Notification*/
    .icon {
    cursor: pointer;
    margin-right: 50px;
    line-height: 60px
}

.icon span {
    background: #f00;
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;
    margin-left: -25px
}

.icon img {
    display: inline-block;
    width: 26px;
    margin-top: 4px
}

.icon:hover {
    opacity: .7
}

.logo {
    flex: 1;
    margin-left: 50px;
    color: #eee;
    font-size: 20px;
    font-family: monospace
}

.notifications {
    width: 300px;
    height: 0px;
    opacity: 0;
    position: absolute;
    top: 63px;
    right: 62px;
    border-radius: 5px 0px 5px 5px;
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.notifications h2 {
    font-size: 14px;
    padding: 10px;
    border-bottom: 1px solid #eee;
    color: #999
}

.notifications h2 span {
    color: #f00
}

.notifications-item {
    display: flex;
    border-bottom: 1px solid #eee;
    padding: 6px 9px;
    margin-bottom: 0px;
    cursor: pointer
}

.notifications-item:hover {
    background-color: #eee
}

.notifications-item img {
    display: block;
    width: 50px;
    height: 50px;
    margin-right: 9px;
    border-radius: 50%;
    margin-top: 2px
}

.notifications-item .text h4 {
    color: #777;
    font-size: 16px;
    margin-top: 3px
}

.notifications-item .text p {
    color: #aaa;
    font-size: 12px
}
</style>
<?php
    //  $inquiry_count = App\model\Notification::where('read_at',NULL)->count();
    //  $inquiry = App\model\Contact::where('deleted_at',NULL)->first();
?>

<header class="topbar" style="background: #312d17;;">
    <div Class="container">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">

                <a class="navbar-brand" href="{{url('/admin')}}">
                    {{-- <h2>{{ getImage() }}</h2>  --}}
                {{-- <img src="{{asset(getImage())}}" style=" width: 235px; height: 60px; " alt="{{env('APP_NAME')}}" class="dark-logo"/></a> --}}
            </div>
            <div class="top-bar-main">
                <div class="float-left">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link navbar-toggler sidebartoggler waves-effect waves-dark float-right" href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a>
                        </li>
                        <!-- Notification -->
                        {{-- <div class="nav-item">
                        <li class="far fa-bell mt-3 bell"></li>
                        @if(auth()->user()->unreadNotifications)
                        <span class="badge bg-danger bell"><li>{{auth()->user()->unreadNotifications->take(5)->count()}}</li></span>
                        @else
                        <span class="badge bg-danger bell"><li>0</li></span>
                        @endif
                        <div class="notifications" id="box">
                        @if(auth()->user()->unreadNotifications)
                        <h2><b>NOTIFICATIONS -<span >{{auth()->user()->unreadnotifications->take(5)->count()}}</span></b> <a href="{{url('admin/markAsRead')}}"><span class="pull-right text-primary mt-3">MarkAllRead</span></a></h2>
                        @endif
                        @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                            <div class="notifications-item">
                                <div class="text">
                                     <h4 class="fa fa-bell"> <span>{{$notification->data['message']}}</span></h4>
                                     <a href="{{url('admin/markAsRead/'.$notification->id)}}">MarkAsRead</a>
                                     <a  href="{{$notification->data['path']}}" class="pull-right read">view</a>

                                </div>
                            </div>
                            @empty
                             <div class="notifications-item">
                                <div class="text">

                                    <p class="mt-3">No Notification Available!</p>
                                    <a href="#"></a>
                                </div>
                            </div>
                            @endforelse
                        </div> --}}
                    </div>
                    </ul>
                </div>

                @if(auth()->check())
                <div class="float-right pr-3">
                    <ul class="navbar-nav my-lg-0 float-right">
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(auth()->check())
                                @if(empty(auth()->user()->profile->pic))
                                <img src="{{asset('storage/uploads/users/no-avatar.png')}}" alt="user-img" >

                                @else
                                <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}" alt="user-img">
                                @endif
                                @endif
                                <span class="circle-status"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                                <ul class="dropdown-user">
                                    <li class="text-center">
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                @if(empty(auth()->user()->profile->pic))
                                                <img src="{{asset('storage/uploads/users/18BUxNzxmG.png')}}"
                                                     alt="user-img"
                                                >
                                                @else
                                                <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}" alt="user-img">
                                                @endif

                                                <div class="clearfix"></div>
                                                <div class="u-text">
                                                    <h4>{{auth()->user()->first_name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                     {{-- @if(auth()->user()->hasRole('admin')) --}}
                                    <li><a href="{{url('admin/account/profile')}}"><i class="fas fa-user mr-1"></i> My Profile</a>
                                    </li>
                                    {{-- @else --}}
                                    <li><a href="{{url('user/account/profile')}}"><i class="fas fa-user mr-1"></i> My Profile</a>
                                    </li>
                                    {{-- @endif --}}

                                    <li role="separator" class="divider"></li>

                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="fas fa-sign-in-alt mr-1"></i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                @else
                <div class="float-right pr-3">
                    <ul class="navbar-nav my-lg-0 float-right">
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="clearfix"></div>
            </div>
        </nav>
    </div>
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

var down = false;
$('#box').css('overflow','hidden');

$('.bell').click(function(e){
var color = $(this).text();
if(down ==true){

$('#box').css('height','0px');
$('#box').css('overflow','hidden');
down = false;
}else{

$('#box').css('height','auto');
$('#box').css('opacity','1');
down = true;

}

});
});

</script>


