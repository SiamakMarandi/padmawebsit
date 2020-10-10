@extends('padma.layout.admin.admin')

@section('content1')

    <h1 class="text-primary">Create User</h1>

    {!! Form::open(['method'=>"POST", 'action'=>"AdminUsersController@store", 'files'=>true]) !!}
    {{csrf_field()}}
    <div class="form-group">
        {!! Form::label('name','Name: ') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}

    </div>


    <div class="form-group">
        {!! Form::label('phone_no','Phone number: ') !!}
        {!! Form::text('phone_no',null,['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('email','E-Mail Address: ') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role: ') !!}
        {!! Form::select('role_id', [''=>'Choose Options'] + $roles, 1,['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('status','Status: ') !!}
        {!! Form::select('status',array(1=>'Active',2=>'Inactive' ),null,['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('user_photo','Photo: ') !!}
        {!! Form::file('user_photo',null,['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('password','Password: ') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}

    </div>


    <div class="form-group">

        {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}

    </div>


    {!! Form::close() !!}




    <div class="alert alert-success">
        @include('padma.layout.includes.form_errors')

        {{ Session::get('unique_error_message') }}

    </div>



    {{--        @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif--}}




    {{--    <form method="post" action="{{route('user-store')}}">
            {{csrf_field()}}

            <input type="text" name="title" placeholder="Enter title">
            <input type="submit" name="submit">


        </form>--}}





@stop