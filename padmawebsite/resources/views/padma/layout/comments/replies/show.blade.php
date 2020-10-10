@extends('padma.layout.admin.admin')


@section('content1')






    <h1>replies</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            {{--   <th>Email</th>  --}}
            <th>Body</th>
            <th>Status</th>
            <th>Post</th>
            <th>Comment</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($replies)

            @foreach($replies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td><a href="{{route('post-edit', $reply->id)}}">{{$reply->user->name}}</a></td>
                    {{-- <td>{{$reply->email}}</td> --}}
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->status}}</td>
                    <td><a href="{{route('home-post', $comment->post->id)}}">View Post</a></td>
                    <td><a href="{{route('showComment', $reply->id)}}">View Comment</a></td>
                    <td>{{$reply->created_at}}</td>
                    <td>{{$reply->updated_at}}</td>
                    <td>

                        @if($reply->status == 'Active')

                            {!! Form::open (['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="active" value="Active">
                            <div class="form-group">

                                {!! Form::submit('Active', ['class'=>'btn btn-success']) !!}

                            </div>

                            {!! Form::close() !!}

                        @elseif($reply->status == 'Pending')

                            {!! Form::open (['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="pending" value="Pending">
                            <div class="form-group">

                                {!! Form::submit('Pending', ['class'=>'btn btn-info']) !!}

                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open (['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="Inactive" value="Inactive">
                            <div class="form-group">
                                {!! Form::submit('Inactive', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}


                        @endif
                    </td>

                    <td>

                        {!! Form::open (['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}

                        <div class="form-group">

                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                        </div>


                        {!! Form::close() !!}


                    </td>


                </tr>
                <tr>

                    {{--  <td> {!! $post->body !!}</td>--}}

                </tr>
            @endforeach
        </tbody>
    </table>

    @else
        <h1 class="text-center">No replies</h1>
    @endif


@stop
