      @extends('layouts.front.app')
      @section('title', 'About Us')
            <style type="text/css">
                .banner-sec {
                    background-image: url('{{asset($banners->image_path)}}');
                }
                .counter-sec{
                    background-image: url('{{asset($counter_content->image4)}}');
                }
            </style>
     @section('content')
    <section>
        <div class="banner-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="banner-text wow fadeInLeft" data-wow-duration="2s">
                            <h2>{{$banners->heading}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner End -->

    <!-- About Start -->
    <section>
        <div class="about-sec">
            <div class="container-fluid padding">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-img wow slideInLeft"> <img src="{{asset($about_contents->image_path)}}" align="text" class="image-abt"> </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-text chg wow slideInRight">
                            <h4>{{$about_contents->title}}</h4>
                            <p class="pragf">{!!$about_contents->description!!}</p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <section>
        <div class="mission-sec">
              <div class="container-fluid padding">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mission-text">
                            <img src="{{asset($about_info->image_path)}}" align="text">
                            <h2>{{$about_info->title}}</h2>
                            <p>{!!$about_info->description!!}</p>
                        </div>
                        <div class="mission-text">
                            <img src="{{asset($about_info->image1)}}" align="text">
                            <h2>{{$about_info->title1}}</h2>
                            <p>{!!$about_info->text1!!}</p>
                        </div>
                        <div class="mission-text">
                            <img src="{{asset($about_info->image2)}}" align="text">
                            <h2>{{$about_info->title2}}</h2>
                            <p>{!!$about_info->text2!!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="mission-img">
                          <img src="{{asset($about_info->image3)}}" align="text">
                      </div>  
                           
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="counter-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="counter-box"> <img src="{{asset($counter_content->image_path)}}" align="text">
                            <h2>${{$counter_content->title}}</h2>
                            <p>{!!$counter_content->description!!}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="counter-box"> <img src="{{asset($counter_content->image1)}}" align="text">
                            <h2>{{$counter_content->title1}}</h2>
                            <p>{!!$counter_content->text1!!}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="counter-box"> <img src="{{asset($counter_content->image2)}}" align="text">
                            <h2>{{$counter_content->title2}}</h2>
                            <p>{!!$counter_content->text2!!}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="counter-box"> <img src="{{asset($counter_content->image3)}}" align="text">
                            <h2>{{$counter_content->title3}}</h2>
                            <p>{!!$counter_content->text3!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <section class="event-sec">
        <div class="container">
            <div class="row">
                    <div class="event-heading text-center">
                        <h2>{{$events_content->title}}</h2> 
                    </div>
                   @foreach($events as $event)
                <div class="col-md-6">
                    <div class="event-box-wrp mt-5"> <img src="{{asset('web-assets/images/event1.png')}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
                            <table>
                                <tr>
                                    <td><b>Day:</b></td>
                                    <td>{{$event->day}}</td>
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
                            </table> <a href="{{url('events-detaill',$event->slug)}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
     @include('layouts.front.template.footer')
    @endsection