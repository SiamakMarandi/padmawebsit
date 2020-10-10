@extends('padma.layout.admin.admin')

@section('content1')

    <h1 class="text-primary">Upload Media</h1>



    {!! Form::open ([ 'action'=>'AdminMediasController@store', 'class'=>'dropzone', 'id'=>'my-awesome-dropzone']) !!}

    <form action="/file-upload" class="dropzone"id="my-awesome-dropzone"></form>


        {!! Form::close() !!}



@stop


