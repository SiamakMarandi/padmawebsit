@extends('padma.layout.admin.admin')

@section('content1')


    <h1 class="text-primary">Edit post</h1>


    <div class="container">


        <div class="row">
            <div class="col-sm-9">

                {!! Form::model ($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

                {{csrf_field()}}

                <div class="form-group">
                    {!! Form::label('title','Title : ') !!}
                    {!! Form::text('title',null,['class'=>'form-control', 'name'=>'title', 'id'=>'title']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('status','Status: ') !!}
                    {!! Form::select('status', array(1=>'publish', '2'=>'published', '3'=>'unpublished'), $counter,['class'=>'form-control', 'name'=>'status', 'id'=>'status']) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('body','Description : ') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'summernote', 'name'=>'editordata']) !!}

                </div>

            </div>
            <div class="col-sm-2">
                <h1>Categories</h1>
                <div class="checkbox">
                    @if($categories)
                        @foreach($categories as $category)
                            <div>
                                <label><input type="checkbox" class="checkbox" id="{{$category->id}}"
                                              value="{{$category->id}}"
                                              name="checkBoxArray[]">{{$category->name}}</label>

                            </div>

                            @foreach($checkedCategories as $checkedCategory)

                                @if($category->name == $checkedCategory->name)

                                    <script>
                                        $('#{{$category->id}}').each(function () {

                                            this.checked = true;

                                        });
                                    </script>

                                @endif
                            @endforeach



                        @endforeach
                    @endif


                </div>


            </div>

            <div class="container col-sm-1">
                <div class="checkbox">
                    <h2><label class="text-danger"><input type="checkbox" value="true" name="slider" id="slider">Slider</label></h2>
                </div>

                <div class="container">
                    <h3  class="text-primary">Slide Number</h3>
                    <div class="radio">
                        <label><input type="radio" name="slide_no" value="slide1" id="slide1" checked>Slide 1</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="slide_no" value="slide2">Slide 2</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="slide_no" value="slide3">Slide 3</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="slide_no" value="slide4">Slide 4</label>
                    </div>
                </div>

                <div class="container">

                    <h3 class="text-info">Picture Number</h3>
                    <label><select id="pic_num" name="pic_num">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                        </select></label>


                </div>
            </div>


        </div>
        <div class="row">

            <div class="form-group">

                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-lm-3', 'name'=>'send', 'id'=>'send']) !!}

                {!! Form::reset('clear Post', ['class'=>'btn btn-danger col-lm-3', 'name'=>'clear', 'id'=>'clear']) !!}


            {!! Form::close() !!}
            </div>
        </div>

        <div>


            {!! Form::model ($post,['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id], 'files'=>true]) !!}


            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-lm-3 ', 'name'=>'send', 'id'=>'send']) !!}

            {{Form::close()}}

        </div>


        <div class="row">

            @include('padma.layout.includes.form_errors')
            <script type="text/javascript">

                $(document).ready(function () {
                    $('#summernote').summernote({

                        height: '300px',
                        lang: 'fa-IR', // default: 'en-US'
                        placeholder: 'Content here ....',
                        fontNames: ['Arial', 'Arial Black'],
                    });


                });

                $('#clear').on('click', function () {

                    $('#summernote').summernote('code', null);

                })

            </script>


        </div>
    </div>


@endsection