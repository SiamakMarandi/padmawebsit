@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Sports List</h2>


        {!! Form::open (['method'=>'POST', 'action'=>'AdminSportsController@store', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name','Name : ') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('description','Description : ') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('sport_photos','Photo: ') !!}
           {{-- {!! Form::file('sport_photos',null,['class'=>'form-control', 'name' => 'sport_photos']) !!}--}}
            <div> <input type="file" class="form-control" name="sport_photos[]" multiple /> </div>

        </div>
       {{-- <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>--}}

        <div class="form-group">

            {!! Form::submit('Create Sport', ['class'=>'btn btn-primary']) !!}

        </div>


        {!! Form::close() !!}

{{--
        <div>

            {!! Form::open ([ 'action'=>'AdminSportsController@store', 'class'=>'dropzone', 'id'=>'my-awesome-dropzone']) !!}

            <form action="/file-upload" class="dropzone"id="my-awesome-dropzone"></form>


            {!! Form::close() !!}

        </div>
--}}



    </div>
    <div>

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop