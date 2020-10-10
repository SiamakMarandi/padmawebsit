@extends('padma.layout.admin.admin')

@section('content1')

    <h1>Edit User</h1>


    <div class="row">

        <div class="col-sm-3">

            @if($user->User_Photo)

                <img src="/images/users/{{$user->User_Photo->photo_path}}" alt="" class="img-responsive img-rounded">
            @else
                <img src="{{ $user->non_photo()}}" alt="picture">
            @endif

        </div>

        <div class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
                {!! Form::select('role_id', $roles, 1,['class'=>'form-control']) !!}

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

                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-3']) !!}

            </div>



        {!! Form::close() !!}



        {!! Form::open (['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

        <div class="form-group">

            {!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-3 pull-right']) !!}

        </div>

        {!! Form::close() !!}
        </div>


    </div>

    <div class="row alert alert-success">

        @include('padma.layout.includes.form_errors')
        {{ Session::get('unique_error_message') }}

    </div>





@stop