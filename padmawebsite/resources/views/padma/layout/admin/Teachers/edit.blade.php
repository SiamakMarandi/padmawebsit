@extends('padma.layout.admin.admin')

@section('content1')

    <h1>Edit Teachers</h1>






    <div class="row">
        <div class="col-sm-10">

            {!! Form::model($teacher, ['method'=>'PATCH', 'action'=>['AdminTeachersController@update', $teacher->id]]) !!}
            {{csrf_field()}}
            <div class="form-group">
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
        </div>
        <div class="col-sm-2">
            <h1>Sports</h1>
            <div class="checkbox">
                @if($sports)
                    @foreach($sports as $sport)
                        <div>
                            <label><input type="checkbox" class="checkbox" id="{{$sport->id}}"
                                          value="{{$sport->id}}"
                                          name="checkBoxArray[]">{{$sport->name}}</label>

                        </div>

                        @foreach($checkedSports as $checkedSport)

                            @if($sport->name == $checkedSport->name)

                                <script>
                                    $('#{{$sport->id}}').each(function () {

                                        this.checked = true;

                                    });
                                </script>

                            @endif
                        @endforeach



                    @endforeach
                @endif


            </div>



        </div>
        <div class="row">

            <div class="form-group">

                {!! Form::submit('Update Teacher', ['class'=>'btn btn-primary col-sm-3']) !!}

            </div>



            {!! Form::close() !!}



            {!! Form::open (['method'=>'DELETE', 'action'=>['AdminTeachersController@destroy', $teacher->id]]) !!}

            <div class="form-group">

                {!! Form::submit('Delete Teacher', ['class'=>'btn btn-danger col-sm-3 pull-right']) !!}

            </div>

            {!! Form::close() !!}
        </div>
    </div>



    <div class="row alert alert-success">

        @include('padma.layout.includes.form_errors')
        {{ Session::get('unique_error_message') }}

    </div>





@stop