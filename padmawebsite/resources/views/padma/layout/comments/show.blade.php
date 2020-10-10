@extends('padma.layout.admin.admin')


@section('content1')






    <h1>Comments</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            {{--   <th>Email</th>  --}}
            <th>Body</th>
            <th>Status</th>
            <th>Post</th>
            <th>Replies</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($comments)

            @foreach($comments as $comment)

                 <tr>
                    <td>{{$comment->id}}</td>
                    <td><a href="{{route('post-edit', $comment->id)}}">{{$comment->user->name}}</a></td>
                    {{-- <td>{{$comment->email}}</td> --}}
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->status}}</td>
                    <td><a href="{{route('home-post', $comment->post->id)}}">View Post</a></td>
                    <td><a href="{{route('reply-show', $comment->id)}}">View Replies</a></td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->updated_at}}</td>
                    <td>

                        @if($comment->status == 'Active')

                            {!! Form::open (['method'=>'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="active" value="Active">
                            <div class="form-group">

                                {!! Form::submit('Active', ['class'=>'btn btn-success']) !!}

                            </div>

                            {!! Form::close() !!}

                        @elseif($comment->status == 'Pending')

                            {!! Form::open (['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="pending" value="Pending">
                            <div class="form-group">

                                {!! Form::submit('Pending', ['class'=>'btn btn-info']) !!}

                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open (['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="Inactive" value="Inactive">
                            <div class="form-group">
                                {!! Form::submit('Inactive', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}


                        @endif
                    </td>

                    <td>

                        {!! Form::open (['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}

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
        <h1 class="text-center">No Comments</h1>
    @endif


@stop
