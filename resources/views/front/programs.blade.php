    @extends('layouts.front.app')
    @section('title', 'Programs')
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
                            <h2>{{$banners->heading}} </h2> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner End -->
    <!-- Programs  Start -->

    <section>
        <div class="Programs-sec">
            <div class="container-fluid padding">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-3">
                        <div class="services-boxs chg box">
                            <div class="s-heading">
                                <h2>{{$service->title}}</h2> 
                            </div>
                            <img src="{{asset($service->image_path)}}" alt="text">
                            <p>{!!$service->short_description!!}</p> <a href="{{ url('program-detail',$service->slug)}}">Read More</a> 
                        </div>
                    </div>
                    @endforeach
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
                                <div class="Inter-childern-box chg1 wow slideInLeft"> <img src="{{asset('web-assets/images/inter-develop-1.png')}}" align="text">
                                    <h2>{{$child_content->title}}</h2>
                                    <ul>
                                        @foreach($child_development as $deveps)
                                        <li>{{$deveps->description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="Inter-childern-box chg wow slideInRight"> <img src="{{asset('web-assets/images/inter-develop-2.png')}}" align="text">
                                    <h2>{{$youth_content->title}}</h2>
                                    <ul>
                                        @foreach($youth_development as $deveps)
                                        <li>{{$deveps->description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="Inter-childern-box chg3 wow bounceInUp"> <img src="{{asset('web-assets/images/inter-develop-3.png')}}" align="text">
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
    @include('layouts.front.template.footer')
    @endsection
