@extends('padma.layout.master')

        <!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>باشگاه ورزشی پادما</title>

    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700" rel="stylesheet">--}}
    <!--
            CSS
            ============================================= -->
{{--    <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  --}}{{--   <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}{{--
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
     <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slide.css') }}" rel="stylesheet">--}}



    <script src="js/vendor/jquery-2.2.4.min.js"></script>
</head>

<body>
<!-- start header Area -->

@section('header')


@stop



@section('banner')


@stop

<!-- end header Area -->

<!-- start banner Area -->
@section('content1')
    <section>
        @if($sliders)
            {{--  @foreach($sliders as $slider)--}}

            <div class="row slider-main">

                <div class="col-sm-7 item1 ">

                    <a href="{{route('home-post', [$sliders[0]->post->id, $sliders[0]->post->slug])}}">
                        <img src="{{ URL::to('/images/img/slide/1.jpg') }}">
                    </a>
                    <div class="img-caption ">{{$sliders[0]->post->title}}</div>

                </div>

                <div class="col-sm-5 item2 ">

                    <a href="{{route('home-post', [$sliders[1]->post->id, $sliders[1]->post->slug])}}">
                        <img src="{{ URL::to('/images/img/slide/2.jpg') }}"></a>
                    <div class="img-caption ">{{$sliders[1]->post->title}}</div>

                </div>
            </div>


            <div class="row slider-sub">
                <div class="col-sm-4 item3">

                    <a href="{{route('home-post', [$sliders[2]->post->id, $sliders[2]->post->slug])}}"> <img
                                src="{{ URL::to('/images/img/slide/3.jpg') }}"></a>
                    <div class="img-caption">{{$sliders[2]->post->title}}</div>

                </div>
                <div class="col-sm-4 item4">
                    <a href="{{route('home-post', [$sliders[3]->post->id, $sliders[3]->post->slug])}}"> <img
                                src="{{ URL::to('/images/img/slide/4.jpg') }}"></a>
                    <div class="img-caption">{{$sliders[3]->post->title}}</div>
                </div>
                <div class="col-sm-4 item5">
                    <a href="{{route('home-post', [$sliders[4]->post->id, $sliders[4]->post->slug])}}"> <img
                                src="{{ URL::to('/images/img/slide/5.jpg') }}"></a>
                    <div class="img-caption">{{$sliders[4]->post->title}}</div>
                </div>


            </div>

            {{--@endforeach--}}
        @endif

    </section>

    {{--
        <div class="col-xs-2 col-sm-2 col-md-2">

        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
        <section class="banner-area relative" id="home">



                <img class="mySlides" src="{{ URL::to('/images/img/slide/1.jpg') }}" width="100%" height="650px" >
                <img class="mySlides" src="{{ URL::to('/images/img/slide/2.jpg') }}" width="100%" height="650px">
                <img class="mySlides" src="{{ URL::to('/images/img/slide/3.jpg') }}" width="100%" height="650px">
                <img class="mySlides" src="{{ URL::to('/images/img/slide/4.jpg') }}" width="100%" height="650px">


            <div class="button-area" align="center">
                <div class="button-group-area">
                    <button class="button btn "  onclick="plusDivs(-1)">❮ Prev</button>
                    <button class="button btn " onclick="plusDivs(1)">Next ❯</button>
                </div>
                <button class="button btn" onclick="currentDiv(1)">1</button>
                <button class="button btn" onclick="currentDiv(2)">2</button>
                <button class="button btn" onclick="currentDiv(3)">3</button>
                <button class="button btn" onclick="currentDiv(4)">4</button>
            </div>

                <script src="js/slide.js"></script>

        </section>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">

        </div>
    --}}

@stop


<!-- End banner Area -->

<!-- Start About Us Area -->
@section('about-us')
    <section class="about-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-center">
                        <h1> پادما می تواند زندگی شما را تغییر بدهد</h1>
                        <p>As you pour the first glass of your favorite Chianti or Chardonnay and settle into an
                            intimate
                            Friday evening.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 about-right">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-about">
                                <h4>Why Choose Us</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-about">
                                <h4>Our Properties</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-about">
                                <h4>Legal Notice</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-about">
                                <h4>Legal Notice</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 about-left">
                    <img class="img-fluid" src="{{ URL::to('/images/img/about-img.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@stop
<!-- End About Us Area -->

<!-- Start Features Area -->
@section('features')
    <section class="feature-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-center">
                        <h1>Our Featured Classes</h1>
                        <p>As you pour the first glass of your favorite Chianti or Chardonnay and settle into an
                            intimate
                            Friday evening.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-6 col-md-6 single-feature">
                    <figure>
                        <img class="img-fluid" src="{{ URL::to('/images/img/featured-class/f1.jpg') }}" alt="">

                        <div class="overlay overlay-bg"></div>
                    </figure>
                    <div class="text-center">
                        <h4 class="mb-10">Get into shape now</h4>
                        <p>
                            <a href="#">Book an appointment</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 single-feature">
                    <figure>
                        <img class="img-fluid" src="{{ URL::to('/images/img/featured-class/f2.jpg') }}" alt="">
                        <div class="overlay overlay-bg"></div>
                    </figure>
                    <div class="text-center">
                        <h4 class="mb-10">Get into shape now</h4>
                        <p>
                            <a href="#">Book an appointment</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 single-feature">
                    <figure>
                        <img class="img-fluid" src="{{ URL::to('/images/img/featured-class/f3.jpg') }}" alt="">
                        <div class="overlay overlay-bg"></div>
                    </figure>
                    <div class="text-center">
                        <h4 class="mb-10">Get into shape now</h4>
                        <p>
                            <a href="#">Book an appointment</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 single-feature">
                    <figure>
                        <img class="img-fluid" src="{{ URL::to('/images/img/featured-class/f4.jpg') }}" alt="">
                        <div class="overlay overlay-bg"></div>
                    </figure>
                    <div class="text-center">
                        <h4 class="mb-10">Get into shape now</h4>
                        <p>
                            <a href="#">Book an appointment</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- End Features Area -->

<!-- Start schedule Area -->
@section('Schedule')
    <section class="schedule-area section-gap">
        <img class="featured-img img-fluid" src="{{ URL::to('/images/img/featured-class/feature-img.png') }}" alt="">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-center">
                        <h1>Schedule your Fitness Process</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="table-wrap col-lg-10">
                    <table class="schdule-table table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th class="head" scope="col">Course name</th>
                            <th class="head" scope="col">mon</th>
                            <th class="head" scope="col">tue</th>
                            <th class="head" scope="col">wed</th>
                            <th class="head" scope="col">thu</th>
                            <th class="head" scope="col">fri</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="name" scope="row">Fitness Aero</th>
                            <td>02.00</td>
                            <td>10.00</td>
                            <td>02.00</td>
                            <td>02.00</td>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <th class="name" scope="row">Senior Fitness</th>
                            <td>02.00</td>
                            <td>10.00</td>
                            <td>02.00</td>
                            <td>02.00</td>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <th class="name" scope="row">Fitness Aero</th>
                            <td>02.00</td>
                            <td>10.00</td>
                            <td>02.00</td>
                            <td>02.00</td>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <th class="name" scope="row">Senior Fitness</th>
                            <td>02.00</td>
                            <td>10.00</td>
                            <td>02.00</td>
                            <td>02.00</td>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <th class="name" scope="row">Senior Fitness</th>
                            <td>02.00</td>
                            <td>10.00</td>
                            <td>02.00</td>
                            <td>02.00</td>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <th class="name" scope="row">Senior Fitness</th>
                            <td>02.00</td>
                            <td>10.00</td>
                            <td>02.00</td>
                            <td>02.00</td>
                            <td>10.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- End schedule Area -->

<!-- Start testomial Area -->
{{--@section('feedback')
    <section class="testomial-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-center">
                        <h1>Client’s Feedback</h1>
                        <p>As you pour the first glass of your favorite Chianti or Chardonnay and settle into an
                            intimate
                            Friday evening.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="active-testimonial-carusel">
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t1.png') }}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
                            scanner, speaker, projector,
                            hardware and more. laptop accessory
                        </p>
                        <h4>Helena Phillips</h4>
                        <p>
                            CEO at Facebook
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t2.png') }}" alt="">
                        <p class="desc">
                            It won’t be a bigger problem to find one video game lover in your neighbor. Since the
                            introduction of Virtual Game, it has
                            been achieving great heights so far as its.
                        </p>
                        <h4>Cordelia Barton</h4>
                        <p>
                            CEO at Twitter
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t3.png') }}" alt="">
                        <p class="desc">
                            About 64% of all on-line teens say that do things online that they wouldn’t want their
                            parents
                            to know about. 11% of all
                            adult internet users visit dating websites.
                        </p>
                        <h4>Carrie Reese</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t1.png') }}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
                            scanner, speaker, projector,
                            hardware and more. laptop accessory
                        </p>
                        <h4>Helena Phillips</h4>
                        <p>
                            CEO at Facebook
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t2.png') }}" alt="">
                        <p class="desc">
                            It won’t be a bigger problem to find one video game lover in your neighbor. Since the
                            introduction of Virtual Game, it has
                            been achieving great heights so far as its.
                        </p>
                        <h4>Cordelia Barton</h4>
                        <p>
                            CEO at Twitter
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t3.png') }}" alt="">
                        <p class="desc">
                            About 64% of all on-line teens say that do things online that they wouldn’t want their
                            parents
                            to know about. 11% of all
                            adult internet users visit dating websites.
                        </p>
                        <h4>Carrie Reese</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t1.png') }}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
                            scanner, speaker, projector,
                            hardware and more. laptop accessory
                        </p>
                        <h4>Helena Phillips</h4>
                        <p>
                            CEO at Facebook
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t2.png') }}" alt="">
                        <p class="desc">
                            It won’t be a bigger problem to find one video game lover in your neighbor. Since the
                            introduction of Virtual Game, it has
                            been achieving great heights so far as its.
                        </p>
                        <h4>Cordelia Barton</h4>
                        <p>
                            CEO at Twitter
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto rounded-circle" src="{{ URL::to('/images/img/t3.png') }}" alt="">
                        <p class="desc">
                            About 64% of all on-line teens say that do things online that they wouldn’t want their
                            parents
                            to know about. 11% of all
                            adult internet users visit dating websites.
                        </p>
                        <h4>Carrie Reese</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop--}}
<!-- End testomial Area -->

<!-- Start blog Area -->
@section('blog')
    <section class="blog-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title-wrap text-center">
                        <h1>Our Recent Blogs</h1>
                        <p>As you pour the first glass of your favorite Chianti or Chardonnay and settle into an
                            intimate
                            Friday evening.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ URL::to('/images/img/b1.jpg') }}" alt="">
                    </div>
                    <a href="single-blog.html"><h4>Portable Fashion for women</h4></a>
                    <div class="text-wrap">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud.
                        </p>
                    </div>
                    <div class="meta-bottom d-flex">
                        <p><span class="lnr lnr-calendar-full"></span> 13th Dec</p>
                        <p><span class="lnr lnr-heart"></span> 15</p>
                        <p><span class="lnr lnr-bubble"></span> 02</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ URL::to('/images/img/b2.jpg') }}" alt="">
                    </div>
                    <a href="single-blog.html"><h4>Summer ware are coming</h4></a>
                    <div class="text-wrap">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud.
                        </p>
                    </div>
                    <div class="meta-bottom d-flex">
                        <p><span class="lnr lnr-calendar-full"></span> 13th Dec</p>
                        <p><span class="lnr lnr-heart"></span> 15</p>
                        <p><span class="lnr lnr-bubble"></span> 02</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ URL::to('/images/img/b3.jpg') }}" alt="">
                    </div>
                    <a href="single-blog.html"><h4>Summer ware are coming</h4></a>
                    <div class="text-wrap">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud.
                        </p>
                    </div>
                    <div class="meta-bottom d-flex">
                        <p><span class="lnr lnr-calendar-full"></span> 13th Dec</p>
                        <p><span class="lnr lnr-heart"></span> 15</p>
                        <p><span class="lnr lnr-bubble"></span> 02</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- End blog Area -->
@section('footer')
    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>About Us</h4>
                        <p>
                            The state of Utah in the United States is home to lots of beautiful National Parks, & Bryce
                            Canyon National Park ranks as
                            three of the magnificent & awe inspiring.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Contact Us</h4>
                        <p>
                            56/8, rockybeach road, santa monica, Los angeles, California - 59620.
                        </p>
                        <p class="number">
                            012-6532-568-9746 <br> 012-6532-569-9748
                        </p>
                    </div>
                </div>
                <div class="col-lg-5  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>You can trust us. we only send offers, not a single spam.</p>
                        <div class="d-flex flex-row" id="mc_embed_signup">

                            <form class="navbar-form"
                                  action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                  method="get">
                                <div class="input-group add-on align-items-center d-flex">
                                    <input class="form-control" name="email" placeholder="Your Email address"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Your Email address'"
                                           required="" type="email">
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                               type="text">
                                    </div>
                                    <div class="input-group-btn">
                                        <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
                                    </div>
                                </div>
                                <div class="info mt-20"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom row align-items-center">
                <p class="footer-text m-0 col-lg-6 col-md-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                    <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <div class="col-lg-6 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
@stop


{{--<script src="js/vendor/jquery-2.2.4.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>--}}
{{--<script src="js/vendor/bootstrap.min.js"></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>--}}
{{--<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>--}}
{{--<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.tabs.min.js"></script>--}}
{{--<script src="js/jquery.nice-select.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>--}}
{{--<script src="js/main.js"></script>--}}

</body>

</html>