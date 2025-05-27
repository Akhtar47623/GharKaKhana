  @extends('layouts.front.app')
  @section('title', 'Home')
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
      .counter-sec{
        background-image: url('{{asset($counter_content->image4)}}');
      }
      .services-sec{
        background-image: url('{{asset($services_content->image_path)}}');

      }
  </style>
  @section('content')
  
    @if(Session::has('error'))
    <script type="text/javascript">
        $('html, body').animate({
            scrollTop: $(validator.errorList[0].element).offset().top
        }, 1000);
    </script>
    @endif
    <!-- header strat -->
    <!-- banner start -->
    <section class="main_slider">
        <div class="bnner-sider-img wow bounceIn"> <img src="{{asset($banners->image_path)}}" align="text" class="image-abt"> </div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($sliders as $key => $slider)
                <div class="carousel-item {{($key ==0)? 'active' : ''}}"> <img src="{{asset($slider->image_path)}}" class="img-fluid" alt="...">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-7 align-self-center">
                                    <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                                        {!!$slider->title!!}
                                        <p>{!!$slider->description!!}</p> <a href="{{route('webDonatePage')}}">{{$slider->button_name}}</a> </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        
        </div>
        <div class="banner-video-icon"> <a href="#"><i class="fas fa-play"></i></a> </div>
    </section>
    <!-- banner end -->
    <!-- Text box Start -->
    <section>
        <div class="text-box-sec">
            <<div class="container-fluid padding">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-3">
                        <div class="text-box-1"> <img src="{{asset($charity_sec->image_path)}}" align="text">
                            <h2>{{$charity_sec->title}}</h2>
                            <p>{{$charity_sec->description}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-3">
                        <div class="text-box-1 chg"> <img src="{{asset($charity_sec->image1)}}" align="text">
                            <h2>{{$charity_sec->title1}}</h2>
                            <p>{{$charity_sec->text1}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-3">
                        <div class="text-box-1"> <img src="{{asset($charity_sec->image2)}}" align="text">
                            <h2>{{$charity_sec->title2}}</h2>
                            <p>{{$charity_sec->text2}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-3">
                        <div class="text-box-1 chg"> <img src="{{asset($charity_sec->image3)}}" align="text">
                            <h2>{{$charity_sec->title3}}</h2>
                            <p>{{$charity_sec->text3}}</p>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>
    <!-- Text box End -->
    <!-- About Start -->
    <section>
        <div class="about-sec">
            <div class="container-fluid padding">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="about-img wow slideInLeft"> <img src="{{asset($about_contents->image_path)}}" align="text" class="image-abt"> </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-text wow slideInRight">
                            <h4>{{$about_contents->title}}</h4>
                            <p class="pragf">{!!$about_contents->description!!}</p> 
                            <div class="row space">
                                <div class="col-lg-4 col-md-6">
                                    <div class="about-mission"> <img src="{{asset($about_contents->image1)}}" align="text">
                                       <h2>{{$about_contents->title1}}</h2>
                                        <p><?= substr($about_contents->text1,0,179);?></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="about-mission"> <img src="{{asset($about_contents->image2)}}" align="text">
                                       <h2>{{$about_contents->title2}}</h2>
                                        <p><?= substr($about_contents->text2,0,179);?></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="about-mission chg"> <img src="{{asset($about_contents->image3)}}" align="text">
                                       <h2>{{$about_contents->title3}}</h2>
                                        <p><?= substr($about_contents->text3,0,179);?></p>
                                    </div>
                                </div>
                            </div> <a href="{{route('webAboutPage')}}">Read More</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About End -->
    <!-- Services Start -->
    <section>
        <div class="services-sec">
            <div class="container-fluid padding">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="services-heading">
                            <h2>{{$services_content->title}}</h2> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="services-silder">
                            @foreach($services as $service)
                            <div>
                                <div class="services-boxs chg">
                                    <div class="s-heading">
                                        <h2>{{$service->title}}</span></h2>
                                    </div>
                                     <img src="{{asset($service->image_path)}}" alt="text">
                                    <p>{!!$service->short_description!!}</p> <a href="{{ url('program-detail',$service->slug)}}">Read More</a> 
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->
    <!-- We Hlep Start -->
    <section class="efforts-sec">
        <div class="container-fluid padding">
            <div class="col-md-12 centerCol text-center wow fadeInUp">
                <h4>{{$help_us_content->title}}</h4> </div>
            <div class="row mt-5">
                @foreach($help_us as $help)
                <div class="col-lg-4 col-md-6 wow slideInLeft">
                    <div class="effort-box-wrap">
                        <div class="contact-area chg3">
                            <div class="help-heading">
                                <h3>{{$help->title}}</h3>
                            </div>
                            <p class="p">{{$help->short_description}}</p>

                            <!-- <div class="progrs-slider-wrp"> <span class="proges-slide"></span> 
                            </div>
                            <div class="result-wrp-flx">
                                <div class="in-text-bx">
                                    <p>Achieved <span total-d="480">$ 0.00</span></p>
                                    <p>Target <span target-d="5000">$5000,000</span></p>
                                </div>
                                <div class="in-percnt">0%</div> -->
                                <!-- slider -->
                                <form action="{{url('donate',$help->id)}}" method="GET" id="donate-{{$help->slug}}">
                                    @csrf
                                    <div class="range-slider">
                                        <input class="range-slider__range" type="range" value="0" min="0" max="500000" name="amount">
                                         <input id="amount" type="hidden" value="0" min="0" max="500000" name="">
                                         <input class="title" type="hidden" value="{{$help->title}}" name="title">
                                        
                                    </div>
                           
                                <!-- slider -->
                                 <div class="result-wrp-flx">
                                <div class="in-text-bx">
                                    <p>Achieved <span total-d="480" class="range-slider__value" value='50'>$ 0.00</span></p>
                                    <p id="target">Target <span target-d="{{$help->target}}">{{$help->target}}</span></p>
                                </div>
                                <div class="in-percnt">0%</div>
                            </div> <a href="javascript:void(0);" onclick="$('#donate-{{$help->slug}}').submit();" class="btn-1">Donate Now</a> 
                            </div>
                        </form>
                        <div class="image-area"> <img src="{{asset($help->image_path)}}" alt=""> </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- We Hlep End -->
    <!-- International Development Start -->
    <section>
        <div class="Inter-develop-sec">
            <div class="container-fluid padding">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-12">
                        <div class="Inter-develop-heading ">
                            <h2>{{$development->title}}</h2>
                            <p>{!!$development->description!!}</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="Inter-childern-box chg1 wow slideInLeft"> <img src="{{asset($child_content->image1)}}" align="text">
                                    <h2>{{$child_content->title}}</h2>
                                    <ul>
                                        @foreach($child_development as $deveps)
                                        <li>{{$deveps->description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="Inter-childern-box chg wow slideInRight"> <img src="{{asset($youth_content->image1)}}" align="text">
                                    <h2>{{$youth_content->title}}</h2>
                                    <ul>
                                        @foreach($youth_development as $deveps)
                                        <li>{{$deveps->description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="Inter-childern-box chg3 wow bounceInUp"> <img src="{{asset($women_content->image1)}}" align="text">
                                    <h2>{{$women_content->title}}</h2>
                                    <ul>
                                        @foreach($women_development as $deveps)
                                        <li>{{$deveps->description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- International Development End -->
    <!-- Counter Start -->
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
    <!-- Counter End -->
    <!-- Event Start -->
    <section class="event-sec">
        <div class="container">
            <div class="row">
                    <div class="event-heading text-center mb-5">
                        <h2>{{$events_content->title}}</h2> 
                    </div>
                   @foreach($events as $event)
                <div class="col-md-6 pb-5">
                    <div class="event-box-wrp "> <img src="{{asset($event->image_path)}}">
                        <div class="event-cont wow slideInLeft">
                            <h4 class="subtitle">Onsite Service</h4>
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
                            </table> <a href="{{url('events-detaill',$event->slug)}}" class="btn-1">Get Direction</a> </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('layouts.front.template.footer')
    @endsection
    <!-- Event End -->
    @push('js')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   

 @endpush  