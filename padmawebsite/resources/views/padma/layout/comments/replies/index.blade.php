@extends('padma.layout.admin.admin')


@section('content1')






    <h1>replies</h1>

    <form action="reply/delete" method="post" class="form-inline">
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
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($replies)

            @foreach($replies as $reply)

                <tr>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$reply->id}}"></td>
                    <td>{{$reply->id}}</td>
                    <td><a href="{{route('user-edit', $reply->user->id)}}">{{$reply->user->name}}</a></td>
                    {{-- <td>{{$reply->email}}</td> --}}
                    <td><a href="{{route('reply-edit', $reply->id)}}">{{$reply->body}}</a></td>
                    <td>{{$reply->status}}</td>
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
    </form>

    @else
        <h1 class="text-center">No replies</h1>
    @endif



    <script>

        $(document).ready(function () {

            $('#options').click(function () {

                if(this.checked) {

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
