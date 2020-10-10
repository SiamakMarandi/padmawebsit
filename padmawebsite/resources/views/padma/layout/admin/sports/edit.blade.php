@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Sports List</h2>

        <div class="col-sm-6">
            {!! Form::model ($sport, ['method'=>'PATCH', 'action'=>['AdminSportsController@update', $sport->id], 'files'=>true]) !!}

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

            <div class="form-group">

                {!! Form::submit('Update Sport', ['class' => 'btn btn-primary col-sm-6']) !!}

            </div>


            {!! Form::close() !!}


            {!! Form::open (['method'=>'DELETE', 'action'=>['AdminSportsController@destroy', $sport->id]]) !!}


            <div class="form-group">

                {!! Form::submit('Delete Sport', ['class'=>'btn btn-danger col-sm-6 ']) !!}

            </div>


            {!! Form::close() !!}


        </div>


    </div>

    <div>

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop