@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Levels List</h2>

        <div class="col-sm-6">
            {!! Form::model ($level, ['method'=>'PATCH', 'action'=>['AdminLevelsController@update', $level->id]]) !!}

            <div class="form-group">
                {!! Form::label('name','Name : ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Update Level', ['class' => 'btn btn-primary col-sm-6']) !!}

            </div>


            {!! Form::close() !!}


            {!! Form::open (['method'=>'DELETE', 'action'=>['AdminLevelsController@destroy', $level->id]]) !!}


            <div class="form-group">

                {!! Form::submit('Delete Level', ['class'=>'btn btn-danger col-sm-6 ']) !!}

            </div>


            {!! Form::close() !!}


        </div>


    </div>

    <div>

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop