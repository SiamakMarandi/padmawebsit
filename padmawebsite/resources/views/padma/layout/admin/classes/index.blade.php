@extends('padma.layout.admin.admin')

@section('content1')

    <div class="container">
        <h2>Class Schedule</h2>
        <table class="table table-striped">
            <thead class="timetable-head">
            <tr class="timetable-head">
                <th>ID</th>
                <th>Sport Name</th>
                <th>Level</th>
                <th>Teacher</th>
                <th>Saturday</th>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>

            @if($timetables)
                @foreach($timetables as $timetable)
                    <tr>
                        <td><a href="{{route('class-edit', $timetable->id)}}">{{$timetable->id}}</a></td>
                        @if($timetable->sport)
                            <td><a href="{{route('sport-edit', $timetable->sport->id)}}">{{$timetable->sport->name}}</a>
                            </td>
                        @endif
                        @if($timetable->level)
                            <td><a href="{{route('level-edit', $timetable->level->id)}}">{{$timetable->level->name}}</a>
                            </td>
                        @endif
                        @if($timetable->teacher)
                            <td>
                                <a href="{{route('teacher-edit', $timetable->teacher->id)}}">{{$timetable->teacher->name}}</a>
                            </td>
                        @endif
                        <td>
                            <div> {{$timetable->saturday_from}}</div>
                            <div> {{$timetable->saturday_to}}</div>
                        </td>
                        <td>
                            <div>  {{$timetable->sunday_from}}</div>
                            <div>  {{$timetable->sunday_to}}</div>
                        </td>
                        <td>
                            <div> {{$timetable->monday_to}}</div>
                            <div> {{$timetable->monday_from}}</div>
                        </td>
                        <td>
                            <div> {{$timetable->tuesday_to}}</div>
                            <div> {{$timetable->tuesday_from}}</div>
                        </td>
                        <td>
                            <div>{{$timetable->wednesday_to}}</div>
                            <div>{{$timetable->wednesday_from}}</div>
                        </td>
                        <td>
                            <div>  {{$timetable->thursday_to}}</div>
                            <div>  {{$timetable->thursday_from}}</div>
                        </td>
                        <td>
                            <div> {{$timetable->friday_to}}</div>
                            <div> {{$timetable->friday_from}}</div>
                        </td>
                        <td>{{$timetable->description}}</td>
                        <td>
                            <div>


                                {!! Form::model ($timetable,['method'=>'DELETE', 'action'=>['AdminClassesController@destroyClass', $timetable->id]]) !!}


                                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-lm-3 ', 'name'=>'send', 'id'=>'send']) !!}

                                {{Form::close()}}

                            </div>


                        </td>

                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
    </div>


@stop