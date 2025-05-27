
    @extends('layouts.front.app')
    @section('title', 'Contact Us')
    <style type="text/css">
        .banner-sec {
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
                            <h2>{{$banners->heading}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner End -->

    <!-- Contact Start -->
     <section>
         <div class="contact-sec">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-12">
                         <div class="contact-text">
                             <h2><?= wordwrap($contact_cms->title,30,"<br>\n")?></h2>
                             <p>{!!$contact_cms->description!!}</p>
                             <ul class="contact-number">
                                 <li><img src="{{asset($contact_cms->image_path)}}" align="text"></li>
                                 <li><h2>Have a Question?</h2><h3>{{returnFlag(52)}}</h3></li>
                             </ul>

                             <ul>
                                 <li><time>{{$contact_cms->text1}}</time></li>
                                 <li><time>{{$contact_cms->text2}}</time></li>
                                 <li><time>{{$contact_cms->text3}}</time></li>
                             </ul> 
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                         <div class="contactus-form">
                             <form action="{{route('webContactPage')}}" method="POST">
                                @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                        <div>
                                            <input type="text" name="first_name" value="{{old('first_name')}}"placeholder="First Name">
                                        </div>
                                     <!--     @error('first_name')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror -->
                                     </div>
                                     <div class="col-lg-6">
                                           <input type="text" name="last_name" value="{{old('last_name')}}"placeholder="Last Name">
                                        <!--     @error('last_name')
                                             <span class="text-danger">{{$message}}</span>
                                            @enderror -->
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         @error('first_name')
                                         <span class="text-danger" id="span">{{$message}}</span>
                                         @enderror
                                     </div>
                                     <div class="col-lg-6">
                                            @error('last_name')
                                             <span class="text-danger" id="span">{{$message}}</span>
                                            @enderror
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <input type="text" name="email" value="{{old('email')}}"placeholder="Email Address">
                                     <!--     @error('email')
                                         <span class="text-danger" id="span">{{$message}}</span>
                                         @enderror -->
                                     </div>
                                     <div class="col-lg-6">
                                           <input type="text" name="phone" id="phone" value="{{old('phone')}}"placeholder="Phone Number">
                                         <!--   @error('phone')
                                            <span class="text-danger" id="span">{{$message}}</span>
                                            @enderror -->
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         @error('email')
                                         <span class="text-danger" id="span">{{$message}}</span>
                                         @enderror
                                     </div>
                                     <div class="col-lg-6">
                                           @error('phone')
                                            <span class="text-danger" id="span">{{$message}}</span>
                                            @enderror
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <input type="text" name="service" value="{{old('service')}}"placeholder="Service">
                                         @error('service')
                                         <span class="text-danger" id="span">{{$message}}</span>
                                         @enderror
                                     </div>
                                     
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <textarea placeholder="Message here" name="message"></textarea>
                                         @error('message')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror
                                     </div>
                                     
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-12">
                                       <button type="submit">Send</button>
                                     </div>
                                     
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     @include('layouts.front.template.footer')
    @endsection
    @push('js')
     <script type="text/javascript">
        $(document).ready(function(){

          new Cleave('#phone', {
            numericOnly:true,
            // prefix:'+',
            delimiter:'-',
            blocks:[3,3,4]
        });
        });
    </script>
    @endpush