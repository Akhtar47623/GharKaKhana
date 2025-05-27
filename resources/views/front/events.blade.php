    @extends('layouts.front.app')
    @section('title', 'Events')
            <style type="text/css">
                .banner-sec{
                    background-image: url('{{asset($banners->image_path)}}');
                }
            </style>
    @section('content')
    <section>
        <div class="banner-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="banner-text wow fadeInLeft" data-wow-duration="2s">
                            <h2>{{$banners->heading}}</h2> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner End -->
    <!-- Events Start -->
      <section class="event-sec chg 1">
        <div class="container">
            <div class="row">
                    <div class="event-heading text-center mb-5" >
                        <h2>{{$events_content->title}}</h2> 
                    </div>
                @foreach($events as $event)
                <div class="col-md-6 pb-5">
                    <div class="event-box-wrp "> <img src="{{asset($event->image_path)}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">{{$event->title}}</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>{{$event->day}}</td>
                                </tr>
                                <tr>
                                    <td><b>Service:</b></td>
                                    <td>{{$event->service}}</td>
                                </tr>
                                <tr>
                                    <td><b>Time:</b></td>
                                    <td>{{$event->time}}</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>{{$event->location}}</td>
                                </tr>
                            </table> <a href="{{ url('events-detaill',$event->slug)}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-md-6 mt-4">
                    <div class="event-box-wrp"> <img src="{{asset('web-assets/images/event2.png')}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>Sunday</td>
                                </tr>
                                <tr>
                                    <td><b>Service:</b></td>
                                    <td>Main Service</td>
                                </tr>
                                <tr>
                                    <td><b>Time:</b></td>
                                    <td>9:00 am -11:40am</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>In Small Church</td>
                                </tr>
                            </table> <a href="{{route('webEventsDetailPage')}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

   <!--  <section class="event-sec chg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="event-heading">
                         </div>
                    <div class="event-box-wrp mt-5"> <img src="{{asset('web-assets/images/event1.png')}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>Sunday</td>
                                </tr>
                                <tr>
                                    <td><b>Service:</b></td>
                                    <td>Main Service</td>
                                </tr>
                                <tr>
                                    <td><b>Time:</b></td>
                                    <td>9:00 am -11:40am</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>In Small Church</td>
                                </tr>
                            </table> <a href="{{route('webEventsDetailPage')}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="event-box-wrp chg"> <img src="{{asset('web-assets/images/event2.png')}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>Sunday</td>
                                </tr>
                                <tr>
                                    <td><b>Service:</b></td>
                                    <td>Main Service</td>
                                </tr>
                                <tr>
                                    <td><b>Time:</b></td>
                                    <td>9:00 am -11:40am</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>In Small Church</td>
                                </tr>
                            </table> <a href="{{route('webEventsDetailPage')}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="event-sec chg 3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="event-heading">
                         </div>
                    <div class="event-box-wrp mt-5"> <img src="{{asset('web-assets/images/event1.png')}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>Sunday</td>
                                </tr>
                                <tr>
                                    <td><b>Service:</b></td>
                                    <td>Main Service</td>
                                </tr>
                                <tr>
                                    <td><b>Time:</b></td>
                                    <td>9:00 am -11:40am</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>In Small Church</td>
                                </tr>
                            </table> <a href="{{route('webEventsDetailPage')}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="event-box-wrp chg"> <img src="{{asset('web-assets/images/event2.png')}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>Sunday</td>
                                </tr>
                                <tr>
                                    <td><b>Service:</b></td>
                                    <td>Main Service</td>
                                </tr>
                                <tr>
                                    <td><b>Time:</b></td>
                                    <td>9:00 am -11:40am</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>In Small Church</td>
                                </tr>
                            </table> <a href="{{route('webEventsDetailPage')}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    @include('layouts.front.template.footer')
    @endsection