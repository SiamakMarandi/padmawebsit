@extends('padma.layout.admin.admin')


@section('content1')






    <h1>Comments</h1>

    <form action="comment/delete" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}

        <div class="form-group">

            <select name="checkBoxArray" id="" class="checkbox-inline">
                <option value="">Delete</option>
            </select>
        </div>

        <div class="form-group">

            <input type="submit" name="delete_all" class="btn btn-danger" value="Delete Items">
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Id</th>
                <th>Author</th>
                {{--   <th>Email</th>  --}}
                <th>Body</th>
                <th>Status</th>
                <th>Post</th>
                <th>Replies</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

            @if(count($comments) > 0)

                @foreach($comments as $comment)

                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$comment->id}}">
                        </td>
                        <td>{{$comment->id}}</td>
                        <td><a href="{{route('user-edit', $comment->user->id)}}">{{$comment->user->name}}</a></td>
                        {{-- <td>{{$comment->email}}</td> --}}
                        <td><a href="{{route('comment-edit', $comment->id)}}">{{$comment->body}}</a></td>
                        <td>{{$comment->status}}</td>
                        <td><a href="{{route('home-post', [$comment->post->id, $comment->post->slug])}}">View Post</a>
                        </td>
                        <td><a href="{{route('reply-show', $comment->id)}}">View Replies</a></td>
                        <td>{{$comment->created_at}}</td>
                        <td>{{$comment->updated_at}}</td>
                        <td>

                            @if($comment->status == 'Active')

                                {!! Form::open (['method'=>'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

                                <input type="hidden" name="Active" value="Active">
                                <div class="form-group">

                                    {!! Form::submit('Active', ['class'=>'btn btn-success']) !!}

                                </div>

                                {!! Form::close() !!}

                            @elseif($comment->status == 'Pending')

                                {!! Form::open (['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}

                                <input type="hidden" name="Pending" value="Pending">
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
    </form>

    @else
        <h1 class="text-center">No Comments</h1>
    @endif



    <script>

        $(document).ready(function () {

            $('#options').click(function () {

                if (this.checked) {

                    $('.checkBoxes').each(function () {

                        this.checked = true;

                    });

                }

                else {

                    $('.checkBoxes').each(function () {

                        this.checked = false;

                    });

                }


            });


        });


    </script>


@stop
