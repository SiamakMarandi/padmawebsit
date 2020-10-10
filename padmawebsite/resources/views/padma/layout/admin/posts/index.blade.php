@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Admin Post Control</h2>

        <form action="post/delete" method="post" class="form-inline">
            {{csrf_field()}}
           {{--// {{method_field('delete')}}--}}

            <div class="form-group">

                <select name="checkBoxArray" id="" class="checkbox-inline">
                    <option value="">Delete</option>
                </select>
            </div>

            <div class="form-group">

                <input type="submit" name="delete_all" value="Delete Items" class="btn btn-danger">
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>Id</th>
                    <th>User</th>
                {{--    <th>Category</th>--}}
                    <th>Title</th>
                    <th>Post</th>
                    <th>Comments</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @if($posts)

                    @foreach($posts as $post)

                        <tr>
                            <td>
                                <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$post->id}}">
                            </td>
                            <td>{{$post->id}}</td>
                            <td><a href="{{route('user-edit', $post->user->id)}}">{{$post->user->name}}</a></td>

{{--                            @if($post->categories)

                                @foreach($post->categories as $category)

                                    <td><a href="{{route('category-edit', $category->id)}}">{{$category->name}}</a></td>

                                @endforeach

                            @else
                                <td>"No category"</td>

                            @endif--}}


                            <td><a href="{{route('post-edit', $post->id)}}">{!! $post->title !!}</a></td>
                            <td><a href="{{route('home-post', [$post->id, $post->slug])}}">View Post</a></td>
                            <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>

                            <td>

                                @if($post->status == 'Publish')
                                    {!! Form::model ($post,['method'=>'PATCH', 'action' => ['AdminPostsController@postStatus', $post->id]]) !!}

                                    <input type="hidden" name="Publish" value="Publish">
                                    <div class="form-group">

                                        {!! Form::submit('Publish', ['class'=>'btn btn-success']) !!}

                                    </div>


                                    {!! Form::close() !!}

                                @elseif($post->status == 'Published')

                                    {!! Form::model ($post,['method'=>'PATCH', 'action'=> ['AdminPostsController@postStatus', $post->id]]) !!}

                                    <input type="hidden" name="Published" value="Published">

                                    <div class="form-group">

                                        {!! Form::submit('Published', ['class'=>'btn btn-info']) !!}

                                    </div>

                                    {!! Form::close() !!}
                                @else
                                    {!! Form::model ($post,['method'=>'PATCH', 'action'=> ['AdminPostsController@postStatus', $post->id]]) !!}

                                    <input type="hidden" name="Unpublished" value="Unpublished">
                                    <div class="form-group">
                                        {!! Form::submit('Unpublished', ['class'=>'btn btn-primary']) !!}
                                    </div>

                                    {!! Form::close() !!}


                                @endif


                            </td>

                            <td>
                                {!! Form::open (['method'=>'DELETE', 'action'=> ['AdminPostsController@destroyPost', $post->id]]) !!}

                                <input type="hidden" name="delete" value="delete">
                                <div class="form-group">
                                    {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                </div>

                                {!! Form::close() !!}

                            </td>


                        </tr>

                    @endforeach
                @endif
                </tbody>
            </table>
        </form>
    </div>


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