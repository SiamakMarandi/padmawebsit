
<!DOCTYPE html>
<head>
    @yield('head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>


    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <!-- include libraries(jQuery, bootstrap) -->



    <!-- include summernote css/js -->
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote.js') }}"></script>
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('summernote/lang/summernote-fa-IR.js') }}"></script>

</head>


<html>


<body>

<nav class="navbar navbar-inverse">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">باشگاه ورزشی پادما</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>

            </ul>



            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>


                <li> <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div></li>
            </ul>
        </div>
    </div>

</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            @yield('side')
            <h2>Dashboard</h2>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class=" glyphicon glyphicon-user"></span> Users</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('user-list')}}">All Users</a></li>
                            <li class="list-group-item"><a href="{{$url = route('user-create')}}">Create User</a></li>
                            <li class="list-group-item"><a href="{{$url = route('user-edit', 1)}}">Edit User</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Roles</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('role-list')}}">All Roles</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3">Posts</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('post-list')}}">All Posts</a></li>
                            <li class="list-group-item"><a href="{{$url = route('post-create')}}">Create Post</a></li>
                            <li class="list-group-item"><a href="{{$url = route('comments')}}">All Comments</a></li>
                            <li class="list-group-item"><a href="{{$url = route('replies')}}">All Replies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse4">Categories</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('category-admin')}}" >All Categories</a></li>
                            <li class="list-group-item"><a href="{{$url = route('category-admin')}}" >Create Category</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse5">Teachers</a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('teacher-admin')}}" >All Teachers</a></li>
                            <li class="list-group-item"><a href="{{$url = route('teacher-create')}}" >Create Teacher</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse6">Sports</a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('sport-admin')}}" >All Sports</a></li>
                            <li class="list-group-item"><a href="{{$url = route('sport-create')}}" >Create Sport</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse7">Levels</a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('level-admin')}}" >All Levels</a></li>
                            <li class="list-group-item"><a href="{{$url = route('level-admin')}}" >Create Level</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse8">Media</a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('media-list')}}" >All Medias</a></li>
                            <li class="list-group-item"><a href="{{$url = route('media-upload')}}" >Upload Media</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse9">Classes</a>
                        </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{$url = route('class-list')}}">All Classes</a></li>
                            <li class="list-group-item"><a href="{{$url = route('class-create')}}">Create Class</a></li>
                            <li class="list-group-item"><a href="{{$url = route('class-edit', 1)}}">Edit Class</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            @yield('content1')





        </div>
    </div>
</div>




</body>
</html>
