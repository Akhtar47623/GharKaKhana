    <header>
        <div class="menuSec">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{route('webIndexPage')}}"><img src="{{asset(getImage())}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-md-7 d-none d-md-block">
                        <ul id="menu">
                            <li><a href="{{route('webIndexPage')}}">Home</a></li>
                            <li><a href="{{route('webAboutPage')}}">About Us </a>
                            </li>
                            <li><a href="{{route('webProgramsPage')}}">Programs  </a></li>
                            <li><a href="{{route('webEventsPage')}}">Events  </a></li>
                            <li><a href="{{route('webContactPage')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6">
                        <div class="menusec-button"> <a href="{{url('donate')}}">Donate Now</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </header>