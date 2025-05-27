    @extends('layouts.front.app')
    @section('title', 'Donate')
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
    <!-- Donate Start -->
    <section>
        <div class="donate-sec">
            <div class="container">
                <form action="{{url('donate')}}" method="POST" id="donate-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="donate-heading">
                                <h2>Form</h2> </div>
                                <div class="donate-checkbox">
                                    <input type="checkbox" id="anonymous" name="anonymous">
                                    <label for="vehicle1"> Donate Anonymously</label>
                                </div>
                                <div class="donate-personal-heading">
                                    <h2>Personal Information</h2> </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="first_name" placeholder="First Name" id="first_name" class="anonymous-donate">
                                        @error('first_name')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        @error('p_first_name')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        <input type="hidden" name="title" placeholder="Title" value="{{(isset($_GET['title']))? $_GET['title'] : ''}}" id="title" >
                                        <input type="text" name="phone_number" placeholder="Your Phone Number" id="phone_number" class="anonymous-donate">
                                         @error('phone_number')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        @error('p_phone_number')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror

                                        <textarea placeholder="Address" id="address" class="anonymous-donate"></textarea >
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="anonymous-donate">
                                        @error('last_name')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        @error('p_last_name')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        <input type="text" name="email" placeholder="Your Email" id="email" class="anonymous-donate">
                                        @error('email')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        @error('p_email')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        <input type="text" name="country" placeholder="Country" id="country" class="anonymous-donate">
                                         @error('country')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        @error('p_country')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        <input type="text" name="amount" placeholder="Amount" value="{{ (isset($_GET['amount'])) ? $_GET['amount'] : '' }}" id="amount"> 
                                        @error('amount')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                        @error('p_amount')
                                        <span class="text-danger" id="span">{{$message}}</span
                                        >
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card-detail-form">
                        <!-- div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="donate-personal-heading">
                                    <h2>Card Detail</h2> </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" name="card_holder" placeholder="Cardholder Name"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="number" name="card_number" placeholder="Card Number"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="Expiration Date" placeholder="Expiration Date"> </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="csv" placeholder="CSV"> </div>
                                </div>
                            </div>
                        </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-btn">
                            <button type="submit" id="stripe">Stripe 
                                <svg id="changeColor" fill="#DC7633" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" zoomAndPan="magnify" viewBox="0 0 375 374.9999" height="32" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><path id="pathAttribute" d="M 33 37.5 L 342 37.5 L 342 345.75 L 33 345.75 Z M 33 37.5 " stroke-width="8.1" stroke="#009cde" fill="#03989e"></path><path id="pathAttribute" d="M 272 42 L 358.730469 42 L 358.730469 341 L 272 341 Z M 272 42 " stroke-width="8.1" stroke="#009cde" fill="#03989e"></path></defs><g><path id="pathAttribute" d="M 187.355469 329.726562 C 109.519531 329.726562 46.421875 266.585938 46.421875 188.703125 C 46.421875 110.816406 109.519531 47.675781 187.355469 47.675781 C 265.1875 47.675781 328.28125 110.816406 328.28125 188.703125 C 328.28125 266.585938 265.1875 329.726562 187.355469 329.726562 Z M 187.355469 37.46875 C 102.300781 37.46875 33.351562 106.460938 33.351562 191.574219 C 33.351562 276.683594 102.300781 345.675781 187.355469 345.675781 C 272.40625 345.675781 341.355469 276.683594 341.355469 191.574219 C 341.355469 106.460938 272.40625 37.46875 187.355469 37.46875 " fill-opacity="1" fill-rule="nonzero" stroke-width="8.1" stroke="#009cde" fill="#03989e"></path></g><path id="pathAttribute" d="M 26.582031 191.574219 C 26.582031 128.707031 56.914062 73.574219 102.472656 42.617188 C 50.828125 72.148438 16.019531 127.789062 16.019531 191.574219 C 16.019531 255.355469 50.828125 310.996094 102.472656 340.527344 C 56.914062 309.566406 26.582031 254.433594 26.582031 191.574219 " fill-opacity="1" fill-rule="nonzero" stroke-width="8.1" stroke="#009cde" fill="#03989e"></path><g><path id="pathAttribute" d="M 272.234375 42.617188 C 317.796875 73.574219 348.121094 128.707031 348.121094 191.574219 C 348.121094 254.433594 317.796875 309.566406 272.234375 340.527344 C 323.878906 310.996094 358.6875 255.355469 358.6875 191.574219 C 358.6875 127.789062 323.878906 72.148438 272.234375 42.617188 " fill-opacity="1" fill-rule="nonzero" stroke-width="8.1" stroke="#009cde" fill="#03989e"></path></g><g id="inner-icon" transform="translate(85, 75)"> <svg xmlns="http://www.w3.org/2000/svg" width="213" height="213" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16" id="IconChangeColor" transform="scale(1, -1)"> <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" id="mainIconPathAttribute" stroke-width="0.9" stroke="#009cde" fill="#03989e"></path> <animateTransform href="#IconChangeColor" attributeType="xml" attributeName="transform" type="rotate" from="0" to="359" dur="2s" repeatCount="indefinite"></animateTransform></svg> </g></svg>
                            </button>
                            <a href="javascript:void(0);" onclick="paypal1()">
                                <svg width="101px" height="32" viewBox="0 0 101 32" preserveAspectRatio="xMinYMin meet" xmlns="http:&#x2F;&#x2F;www.w3.org&#x2F;2000&#x2F;svg"><path fill="#003087" d="M 12.237 2.8 L 4.437 2.8 C 3.937 2.8 3.437 3.2 3.337 3.7 L 0.237 23.7 C 0.137 24.1 0.437 24.4 0.837 24.4 L 4.537 24.4 C 5.037 24.4 5.537 24 5.637 23.5 L 6.437 18.1 C 6.537 17.6 6.937 17.2 7.537 17.2 L 10.037 17.2 C 15.137 17.2 18.137 14.7 18.937 9.8 C 19.237 7.7 18.937 6 17.937 4.8 C 16.837 3.5 14.837 2.8 12.237 2.8 Z M 13.137 10.1 C 12.737 12.9 10.537 12.9 8.537 12.9 L 7.337 12.9 L 8.137 7.7 C 8.137 7.4 8.437 7.2 8.737 7.2 L 9.237 7.2 C 10.637 7.2 11.937 7.2 12.637 8 C 13.137 8.4 13.337 9.1 13.137 10.1 Z"></path><path fill="#003087" d="M 35.437 10 L 31.737 10 C 31.437 10 31.137 10.2 31.137 10.5 L 30.937 11.5 L 30.637 11.1 C 29.837 9.9 28.037 9.5 26.237 9.5 C 22.137 9.5 18.637 12.6 17.937 17 C 17.537 19.2 18.037 21.3 19.337 22.7 C 20.437 24 22.137 24.6 24.037 24.6 C 27.337 24.6 29.237 22.5 29.237 22.5 L 29.037 23.5 C 28.937 23.9 29.237 24.3 29.637 24.3 L 33.037 24.3 C 33.537 24.3 34.037 23.9 34.137 23.4 L 36.137 10.6 C 36.237 10.4 35.837 10 35.437 10 Z M 30.337 17.2 C 29.937 19.3 28.337 20.8 26.137 20.8 C 25.037 20.8 24.237 20.5 23.637 19.8 C 23.037 19.1 22.837 18.2 23.037 17.2 C 23.337 15.1 25.137 13.6 27.237 13.6 C 28.337 13.6 29.137 14 29.737 14.6 C 30.237 15.3 30.437 16.2 30.337 17.2 Z"></path><path fill="#003087" d="M 55.337 10 L 51.637 10 C 51.237 10 50.937 10.2 50.737 10.5 L 45.537 18.1 L 43.337 10.8 C 43.237 10.3 42.737 10 42.337 10 L 38.637 10 C 38.237 10 37.837 10.4 38.037 10.9 L 42.137 23 L 38.237 28.4 C 37.937 28.8 38.237 29.4 38.737 29.4 L 42.437 29.4 C 42.837 29.4 43.137 29.2 43.337 28.9 L 55.837 10.9 C 56.137 10.6 55.837 10 55.337 10 Z"></path><path fill="#009cde" d="M 67.737 2.8 L 59.937 2.8 C 59.437 2.8 58.937 3.2 58.837 3.7 L 55.737 23.6 C 55.637 24 55.937 24.3 56.337 24.3 L 60.337 24.3 C 60.737 24.3 61.037 24 61.037 23.7 L 61.937 18 C 62.037 17.5 62.437 17.1 63.037 17.1 L 65.537 17.1 C 70.637 17.1 73.637 14.6 74.437 9.7 C 74.737 7.6 74.437 5.9 73.437 4.7 C 72.237 3.5 70.337 2.8 67.737 2.8 Z M 68.637 10.1 C 68.237 12.9 66.037 12.9 64.037 12.9 L 62.837 12.9 L 63.637 7.7 C 63.637 7.4 63.937 7.2 64.237 7.2 L 64.737 7.2 C 66.137 7.2 67.437 7.2 68.137 8 C 68.637 8.4 68.737 9.1 68.637 10.1 Z"></path><path fill="#009cde" d="M 90.937 10 L 87.237 10 C 86.937 10 86.637 10.2 86.637 10.5 L 86.437 11.5 L 86.137 11.1 C 85.337 9.9 83.537 9.5 81.737 9.5 C 77.637 9.5 74.137 12.6 73.437 17 C 73.037 19.2 73.537 21.3 74.837 22.7 C 75.937 24 77.637 24.6 79.537 24.6 C 82.837 24.6 84.737 22.5 84.737 22.5 L 84.537 23.5 C 84.437 23.9 84.737 24.3 85.137 24.3 L 88.537 24.3 C 89.037 24.3 89.537 23.9 89.637 23.4 L 91.637 10.6 C 91.637 10.4 91.337 10 90.937 10 Z M 85.737 17.2 C 85.337 19.3 83.737 20.8 81.537 20.8 C 80.437 20.8 79.637 20.5 79.037 19.8 C 78.437 19.1 78.237 18.2 78.437 17.2 C 78.737 15.1 80.537 13.6 82.637 13.6 C 83.737 13.6 84.537 14 85.137 14.6 C 85.737 15.3 85.937 16.2 85.737 17.2 Z"></path><path fill="#009cde" d="M 95.337 3.3 L 92.137 23.6 C 92.037 24 92.337 24.3 92.737 24.3 L 95.937 24.3 C 96.437 24.3 96.937 23.9 97.037 23.4 L 100.237 3.5 C 100.337 3.1 100.037 2.8 99.637 2.8 L 96.037 2.8 C 95.637 2.8 95.437 3 95.337 3.3 Z"></path>
                                </svg>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                <form action="{{route('processTransaction')}}" method="POST" class="d-none" id="pay-form">
                    @csrf
                    <div class="donate-checkbox">
                        <input type="text" id="p_anonymous" name="p_anonymous" value="">
                        <label for="vehicle1"> Donate Anonymously</label>
                    </div>
                    <input type="text" name="p_first_name" placeholder="First Name" id="p_first_name">
                    <input type="hidden" name="p_title" placeholder="First Name" value="{{(isset($_GET['title']))? $_GET['title'] : ''}}" id="p_title">
                    <input type="text" name="p_phone_number" placeholder="Your Phone Number" id="p_phone_number">
                    <textarea placeholder="Contact Address" id="address"></textarea>
                      <input type="text" name="p_last_name" placeholder="Last Name" id="p_last_name">
                    <input type="text" name="p_email" id="p_email" placeholder="Your Email">
                    <input type="text" name="p_country" placeholder="Country" id="p_country">
                    <input type="text" name="p_amount" placeholder="Amount" value="{{ (isset($_GET['amount'])) ? $_GET['amount'] : '' }}" id="p_amount">
                </form>
            </div>
        </div>
    </section>
   @include('layouts.front.template.footer')
    @endsection
      @push('js')
     <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.3/dist/cleave.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script type="text/javascript">
        $(document).ready(function(){
          new Cleave('#phone_number', {
            numericOnly:true,
            // prefix:'+',
            delimiter:'-',
            blocks:[3,3,4]
        });

       // $('#paypal1').click(function(e){
       //      e.preventDefault();
            
       //  }) 

        });
  </script>
    @endpush
  