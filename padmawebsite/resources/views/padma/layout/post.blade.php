@extends('padma.layout.master')






@section('content1')





@stop

@section('content2')

    <div class="post-container-body">

        <div class="row post-banner ">


        </div>

        <div class="row post-title-row">
            <article class="col-sm-2">
            </article>
            <article class="col-sm-8 post-container ">
                <section class="posts-title">{!! $post->title !!}</section>
                <section class="post-user">{!! $post->user->name !!}</section>
                <section class="post-date">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</section>
                <section class="post-line"></section>
                @foreach($post->categories as $category)

                    <button type="button" class="btn btn-success post-category">{!! $category->name !!}</button>
                @endforeach
            </article>
            <article class="col-sm-2">
            </article>
        </div>
        <div class="row">
            @if($post)

                {{-- <tr>

                     <td rowspan="3"><h1>PHOTO</h1></td>


                 </tr>
                 <tr>
                     <td class="td-title" height="80px">{!! $post->title !!}</td>
                 </tr>

                 <tr>

                     <td class="td-body" height="150px" width="70%">
                         {!! $post->body!!}

                     </td>

                 </tr>
                 <tr>
                     <td class="td-created">
                         <p>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}} </p>
                     </td>
                     <td class="td-category">
                         <p><a href="#">category</a> | <a href="#">{{$post->user->name}}</a></p>
                     </td>

                 </tr>
                 <tr>
                     <td colspan="2"><p class="body-border"></p></td>
                 </tr>--}}

                <article class="col-sm-2">
                </article>
                <article class="post-container  col-sm-8">


                    <section class="post-body">{!! $post->body !!}</section>

                </article>
                <article class="col-sm-2"></article>

            @endif
        </div>

        <div class="row">
            <article class="col-sm-2">
            </article>
            <article class="post-container col-sm-8">

                @if(Auth::check())

                    <div class="well">
                        {!! Form::open (['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
                        {{csrf_field()}}

                        <input type="hidden" name="post_id" value="{{$post->id}}">

                        <div class="form-group">
                            {!! Form::label('body','دیدگاه کاربران :') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::submit('ارسال دیدگاه', ['class'=>'btn btn-primary']) !!}

                        </div>


                        {!! Form::close() !!}

                    </div>
                @else
                    <div>
                        برای گفتگو با کاربران وارد حساب کاربری خود شوید<a href="http://padma.inf/home"><input
                                    type="button" class="btn btn-primary" value="ورود"></a>
                    </div>

                @endif

                @if(Session::has('comment_message'))
                    {{Session('comment_message')}}

                @endif


                @if(count($post->comments) > 0)

                    @foreach($post->comments as $comment)

                        @if($comment->status == 'Active')


                            <div class="media pull-left ">

                                <a href="" class="pull-left"> </a>

                                @if(!empty($comment->user->user_photo->photo_path))
                                    <img height="64" src="/images/users/{{$comment->user->user_photo->photo_path}}">
                                @else
                                    <img height="50" src="{{ $comment->user->non_photo()}}" alt="picture">
                                @endif

                                <div class="media-body ">
                                    <h4 class="media-heading ">{{$comment->user->name}}
                                        <small>{{$comment->created_at}}</small>

                                    </h4>
                                    <p>{{$comment->body}}</p>


                                    <!-- Nested -->
                                    @if(count($comment->replies) > 0)
                                        @foreach($comment->replies as $reply)
                                            @if(($reply->status == 'Active') && ($comment->status == 'Active'))
                                                <div class="media">
                                                    <a href="" class="pull-left"> </a>

                                                    @if(!empty($reply->user->user_photo->photo_path))
                                                        <img height="64"
                                                             src="/images/users/{{$reply->user->user_photo->photo_path}}">
                                                    @else
                                                        <img height="50" src="{{ $reply->user->non_photo()}}"
                                                             alt="picture">
                                                    @endif


                                                    <div class="media-body">
                                                        <div class="media-body ">
                                                            <h4 class="media-heading">{{$reply->user->name}}
                                                                <small>{{$reply->created_at}}</small>

                                                            </h4>
                                                            <p>{{$reply->body}}</p>
                                                            <h4 class="media-heading">Nested Start Bootstrap
                                                                <small>August</small>
                                                            </h4>

                                                        </div>

                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    {!! Form::open (['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    <div class="form-group">
                                        {!! Form::label('body','Write your Reply : ') !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control', 'rows'=>1]) !!}

                                    </div>

                                    <div class="form-group">

                                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

                                    </div>

                                    {!! Form::close() !!}
                                </div>

                                <!-- Nested -->


                            </div>



                        @endif
                    @endforeach

                @endif
            </article>
            <article class="col-sm-2">
            </article>

        </div>
    </div>

@stop