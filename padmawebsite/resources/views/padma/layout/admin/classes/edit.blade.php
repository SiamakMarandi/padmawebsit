@extends('padma.layout.admin.admin')

<body>

@section('content1')


    <h1 class="text-primary">Edit Class</h1>

    <div class="container">


        <div class="row">
            <div class="col-sm-10">

                {!! Form::model ($timetable,['method'=>'PATCH', 'action'=>['AdminClassesController@update', $timetable->id]]) !!}

                {{csrf_field()}}

                <div class="row">
                    <div class="form-group">
                        {!! Form::label('sportName_id','Sport Name : ') !!}

                        {!! Form::select('sportName_id', [''=>'Choose Sport'] + $sports, $sports_counter,['class'=>'form-control']) !!}

                    </div>
                    <div class="form-group ">
                        {!! Form::label('level','Levels: ') !!}
                        {!! Form::select('level',[''=>'Choose Levels'] + $levels, $levels_counter,['class'=>'form-control', 'name'=>'level', 'id'=>'level']) !!}

                    </div>

                    <div class="form-group">
                        {!! Form::label('teacherName_id','Teacher Name : ') !!}
                        {!! Form::select('teacherName_id',[''=>'Choose Teacher'] + $teachers,$teachers_counter,['class'=>'form-control', 'name'=>'teacherName_id', 'id'=>'teacherName_id']) !!}

                    </div>
                </div>
                <div class="row">
                    <h4>Saturday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('saturday_from','From : ') !!}
                            {{-- {!! Form::text('saturday_from',null,['class'=>'form-control', 'name'=>'saturday_from', 'id'=>'saturday_from']) !!}--}}
                            <input id="saturday_from" width="276" name="saturday_from"/>
                            <script>
                                $('#saturday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('saturday_to','To : ') !!}
                            {{-- {!! Form::time('saturday_to',null,['class'=>'form-control', 'name'=>'saturday_to', 'id'=>'saturday_to']) !!}--}}
                            <input id="saturday_to" width="276" name="saturday_to"/>
                            <script>
                                $('#saturday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>


                        </div>
                    </div>

                </div>

                <div class="row">
                    <h4>Sunday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('sunday_from','From : ') !!}
                            <input id="sunday_from" width="276" name="sunday_from"/>
                            <script>
                                $('#sunday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('sunday_to','To : ') !!}
                            <input id="sunday_to" width="276" name="sunday_to"/>
                            <script>
                                $('#sunday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <h4>Monday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('monday_from','From : ') !!}
                            <input id="monday_from" width="276" name="monday_from"/>
                            <script>
                                $('#monday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('monday_to','To : ') !!}
                            <input id="monday_to" width="276" name="monday_to"/>
                            <script>
                                $('#monday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <h4>Tuesday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('tuesday_from','From : ') !!}
                            <input id="tuesday_from" width="276" name="tuesday_from"/>
                            <script>
                                $('#tuesday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('tuesday_to','To : ') !!}
                            <input id="tuesday_to" width="276" name="tuesday_to"/>
                            <script>
                                $('#tuesday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <h4>Wednesday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('wednesday_from','From : ') !!}
                            <input id="wednesday_from" width="276" name="wednesday_from"/>
                            <script>
                                $('#wednesday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('wednesday_to','To : ') !!}
                            <input id="wednesday_to" width="276" name="wednesday_to"/>
                            <script>
                                $('#wednesday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <h4>Thursday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('thursday_from','From : ') !!}
                            <input id="thursday_from" width="276" name="thursday_from"/>
                            <script>
                                $('#thursday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('thursday_to','To : ') !!}
                            <input id="thursday_to" width="276" name="thursday_to"/>
                            <script>
                                $('#thursday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <h4>Friday</h4>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('friday_from','From : ') !!}
                            <input id="friday_from" width="276" name="friday_from"/>
                            <script>
                                $('#friday_from').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('friday_to','To : ') !!}
                            <input id="friday_to" width="276" name="friday_to"/>
                            <script>
                                $('#friday_to').timepicker({
                                    showOtherMonths: true
                                });
                            </script>
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    {!! Form::label('description','Descriptions : ') !!}
                    {!! Form::text('description',null,['class'=>'form-control', 'name'=>'description', 'id'=>'description']) !!}

                </div>


            </div>


        </div>

        <div class="row">


            <div class="form-group">

                {!! Form::submit('Update Class', ['class'=>'btn btn-primary', 'name'=>'send', 'id'=>'send']) !!}
                {!! Form::reset('Clear Class', ['class'=>'btn btn-danger pull-right', 'name'=>'clear', 'id'=>'clear']) !!}

            </div>


            {!! Form::close() !!}

            {!! Form::open (['method'=>'DELETE', 'action'=>['AdminClassesController@destroy', $timetable->id]]) !!}

            <div class="form-group">

                {!! Form::submit('Delete Class', ['class'=>'btn btn-danger col-sm-3 pull-right']) !!}

            </div>

            {!! Form::close() !!}

        </div>

        <div class="row">


            @include('padma.layout.includes.form_errors')


        </div>

    </div>


@endsection