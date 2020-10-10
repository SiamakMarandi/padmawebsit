@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Categories List</h2>

        <div class="col-sm-6">
            {!! Form::model ($role, ['method'=>'PATCH', 'action'=>['AdminRolesController@update', $role->id]]) !!}

            <div class="form-group">
                {!! Form::label('name','Name : ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Update Role', ['class' => 'btn btn-primary col-sm-6']) !!}

            </div>


            {!! Form::close() !!}


            {!! Form::open (['method'=>'DELETE', 'action'=>['AdminRolesController@destroy', $role->id]]) !!}


            <div class="form-group">

                {!! Form::submit('Delete Role', ['class'=>'btn btn-danger col-sm-6 ']) !!}

            </div>


            {!! Form::close() !!}


        </div>


    </div>

    <div>

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop