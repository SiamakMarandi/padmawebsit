@extends('padma.layout.admin.admin')

@section('content1')

    <h1 class="text-primary">Create Teacher</h1>
    <div class="row">
        <div class="col-sm-10">

            {!! Form::open(['method'=>"POST", 'action'=>"AdminTeachersController@store"]) !!}
            {{csrf_field()}}
            <div class="form-group">
                {!! Form::label('name','Name: ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('id_number','Identity Number: ') !!}
                {!! Form::text('id_number',null,['class'=>'form-control']) !!}

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
                {!! Form::label('status','Status: ') !!}
                {!! Form::select('status',array(1=>'Active',2=>'Inactive' ),null,['class'=>'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('address','Address: ') !!}
                {!! Form::text('address',null,['class'=>'form-control']) !!}

            </div>
        </div>
        <div class="col-sm-2">
            <h1>Sports</h1>
            @if($sports)

                @foreach($sports as $sport)
                    <div>
                        <label><input type="checkbox" value="{{$sport->id}}" name="checkBoxArray[]">{{$sport->name}}
                        </label>
                    </div>

                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="form-group">

            {!! Form::submit('Create Teacher', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('clear Post', ['class'=>'btn btn-danger pull-right', 'name'=>'clear', 'id'=>'clear']) !!}
        </div>


        {!! Form::close() !!}


        <div class="alert alert-success">
            @include('padma.layout.includes.form_errors')

            {{ Session::get('unique_error_message') }}

        </div>


    </div>



@stop