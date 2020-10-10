@extends('padma.layout.master')
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slide.css') }}" rel="stylesheet">
    {{--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>--}}

    {{-- <script src="js/vendor/bootstrap.min.js"></script>--}}
    <script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"></script>

</head>
@section('header')
    <nav class="navbar navbar-inverse navbar-fixed-top" id="nav-master">
        @yield('header')
        <div class="container-fluid">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                @if(count($navigation))

                    <ul class="nav navbar-nav font-weight-bold" >
                        <li><a class="navbar-brand centered" href="/">
                                <img src="{{ URL::to('/images/nav/logo_padma.png') }}" alt="Logo" style="width:40px; ">
                            </a></li>

                        <li class="nav-text"><a class="dropdown-nav" href="/">{{$navigation[0]}}</a></li>
                        <li class="dropdown navbar-brand centered text-white font-weight-bold">
                            <a class="nav-text-sub dropdown-toggle dropdown-nav " data-toggle="dropdown" href="">{{$navigation[1]}}<span class="caret"></span></a>
                            <ul class="dropdown-menu ">
                                <li class="nav-text"><a href="{{route('articles')}}">مقالات</a></li>
                                <li class="nav-text"><a href="">اخبار</a></li>

                            </ul>
                        </li>
                        <li class="nav-text "><a class=" dropdown-nav" href="/schedule">{{$navigation[2]}}</a></li>
                        {{-- <li class="nav-text"><a class="dropdown-nav" href="#">{{$navigation[3]}}</a></li>--}}
                        <li class="dropdown navbar-brand centered text-white font-weight-bold">
                            <a class="nav-text-sub dropdown-toggle dropdown-nav " data-toggle="dropdown" href="">{{$navigation[3]}}<span class="caret"></span></a>
                            <ul class="dropdown-menu ">
                                @foreach($sports as $sport)
                                    <li class="nav-text"><a href="{{route('sport-page', [$sport->id, $sport->name])}}">{{$sport->name}}</a></li>
                                @endforeach

                            </ul>
                        </li>

                        <li class="nav-text"><a class="dropdown-nav" href="/about">{{$navigation[4]}}</a></li>
                        <li class="nav-text"><a class="dropdown-nav" href="/contact">{{$navigation[5]}}</a></li>


                        @endif

                    </ul>

                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-text"><a href="#"><i class="fa fa-telegram"></i></a></li>
                        <li class="nav-text"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="nav-text"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        @if(Auth::user())

                            <li class="dropdown nav-text">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else

                            <li class="nav-text"><a href="/home"><span class="glyphicon glyphicon-user"></span> </a></li>

                        @endif


                    </ul>
                    <form class="navbar-form navbar-left nav-search" action="/action_page.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
            </div>
        </div>

    </nav>
@stop

@section('banner')
    <div>

    </div>

@stop


@section('banner')
    <div>
        <h1></h1>
    </div>

@stop

@section('content1')


    <section>
       <h1>{{$sport_name->name}}</h1>
       <h1>{{$sport_name->description}}</h1>



    </section>
@stop

@section('content2')

    <div class="container">
        <h2>Image Gallery</h2>

        <div class="row">
            <div class="col-md-12">
                <div>
                  {{--  @if($user->user_photo)--}}
                        @foreach($files as $file)
                        <div><img height="150" src="/{{$file}}" alt="here is the pic"></div>
                   @endforeach
                   {{-- @endif--}}
                </div>
            </div>


        </div>
    </div>


    @stop

