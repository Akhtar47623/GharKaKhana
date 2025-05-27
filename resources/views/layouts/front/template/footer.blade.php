<footer>
        <div class="footer-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-logo animated bounce">
                            <div class="logo">
                                <a href="index.html"><img src="{{asset(getImage())}}" align="text"></a>
                            </div>
                            <p>{{returnFlag(58)}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-newsletter animated bounce">
                            <h2>Newsletter</h2>
                            <p>{{returnFlag(49)}}</p>
                            <div class="ftr-new-input">
                                <form action="javascript:void()" method="POST" id="newsletter-form">
                                    @csrf
                                    <input type="email" name="newsletter_email" id="newsletter_email" placeholder="Email...">
                                    <span class="text-danger error-line" id="newsletterErrorMsg"></span>
                                    <!-- <span class="text-success" id="newsletterSuccessMsg"></span> -->
                                    <input type="hidden" name="token" value="{{csrf_token()}}" id="token" >
                                    <input type="hidden" name="route" value="{{route('newsletter')}}" id="route" >

                                    @error('newsletter_email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="footer-newsletter-icon">
                                        <button  class="footer-btn" type="submit"><a><i class="far fa-paper-plane"></i></a></button>
                                    </div>
                                </form>
                            </div>
                            <ul>
                                <li>
                                    <h2>Social Network:</h2></li>
                                <li><a href="{{returnFlag(682)}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{returnFlag(1960)}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{returnFlag(53)}}" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="{{returnFlag(1962)}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-contact animated bounce">
                            <h2>Contact Info</h2>
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i> <a href="{{returnFlag(50)}}">{{returnFlag(50)}}</span></a></li>
                                <li><a href="Tel:{{returnFlag(52)}}"><i class="fas fa-phone-alt"></i> {{returnFlag(52)}}</a></li>
                                <li><a href="mailto:{{returnFlag(51)}}"><i class="fas fa-envelope"></i> {{returnFlag(51)}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p>{{returnFlag(499)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
 
    