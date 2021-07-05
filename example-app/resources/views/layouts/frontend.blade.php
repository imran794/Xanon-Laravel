
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xenon</title>
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/assets/plugins/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/assets/css/plugins/slick-slider/slick.css">
    <link rel="stylesheet" href="{{asset('frontend_assets')}}/assets/css/style.css">
</head>
<body>
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3">
                    <div class="logo">
                        <a href="">xenon</a>
                    </div>
                </div>
                <div class="col-xxl-9">
                    <div class="menu">
                        <ul class="d-flex justify-content-end">
                            <li><a href="">home</a></li>
                            <li><a href="">about</a></li>
                            <li><a href="">services</a></li>
                            <li><a href="">projects</a></li>
                            <li><a href="">expreince</a></li>
                            <li><a href="">blog</a></li>
                            <li><a href="">testimonials</a></li>
                            <li><a href="">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

   @yield('admin-content')
    <section class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section-title text-center mb-60">
                        <h2>Contact Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-7">
                    <div class="contact-form">

                        <form action="{{ route('contactform.store') }}" method="POST">
                            @csrf
                        <input name="name" type="text" placeholder="Name">
                        <input name="subject" type="text" placeholder="Subject">
                        <input name="email" type="text" placeholder="Email">
                        <textarea name="message" placeholder="Message" id="" cols="30" rows="5"></textarea>
                        <input type="submit" value="Send">
                    </form>
                    </div>
                </div>
                <div class="col-xxl-5">
                    <div class="single-contact">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>address <span>New York, USA</span></h4>
                    </div>
                    <div class="single-contact">
                        <i class="fas fa-phone-alt"></i>
                        <h4>Phone <span>12345678</span></h4>
                    </div>
                    <div class="single-contact">
                        <i class="far fa-envelope"></i>
                        <h4>Email <span>Imran@gmail.com</span></h4>
                    </div>
                    <div class="single-contact">
                        <i class="fas fa-globe-europe"></i>
                        <h4>website <span>imran.com</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('frontend_assets')}}/assets/js/jquery-1.12.min.js"></script>
      <script src="{{asset('frontend_assets')}}/assets/js/magnific-popup.min.js"></script>
      <script src="{{asset('frontend_assets')}}/assets/js/slick.min.js"></script>
      <script src="{{asset('frontend_assets')}}/assets/js/main.js"></script>

</body>
</html>