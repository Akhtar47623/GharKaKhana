    @extends('layouts.front.app')
    @section('title', 'Events Detail')
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
    <!-- Events Detail Start -->
    <section>
        <div class="events-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="events-img">
                            <img src="{{asset($events->image_path)}}" align="text">
                        </div>
                        <div class="events-text">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <p>{!!$events->additional_info!!}</p>
                                    <h2>Events Description</h2>
                                    @if($events->event_description != null)
                                        <p>{!!$events->event_description!!}</p>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="events-details">
                                        <ul>
                                            <li><h2>Events Details</h2></li>
                                            <li class="baoder-right event-chg"><p><b>Organizer :</b>{{$events->organizer}}</p></li>
                                            <li class="baoder-right event-chg"><p><b>Start Date : </b>{{$events->start_date}}</p></li>
                                            <li class="baoder-right event-chg"><p><b> End Date :</b>{{$events->end_date}}</p></li>
                                            <li class="event-chg"><p><b> Time :</b>{{$events->time}}</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-gallery">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="event-gallery-heading">
                                        <h2>Event Gallery</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="event-gallery-images">
                                <div class="row">
                                    @foreach($events_gallery as $gallery)
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="event-gallery-img">
                                            <img src="{{asset($gallery->image_path)}}" align="text">
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="event-gallery-img">
                                            <img src="{{asset('web-assets/images/event-gallery-2.png')}}" align="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="event-gallery-img">
                                            <img src="{{asset('web-assets/images/event-gallery-3.png')}}" align="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="event-gallery-img">
                                            <img src="{{asset('web-assets/images/event-gallery-4.png')}}" align="text">
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="event-sec chgevent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-event-heading">
                        <h2>Related Post</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($related_events as $event)
                <div class="col-md-6">
                   
                    <div class="event-box-wrp mt-5"> <img src="{{asset($event->image_path)}}">
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
               <!--  <div class="col-md-6 mt-4">
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
                            </table> <a href="event-detail.html" class="btn-1">Get Direction</a> </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
   @include('layouts.front.template.footer')
    @endsection