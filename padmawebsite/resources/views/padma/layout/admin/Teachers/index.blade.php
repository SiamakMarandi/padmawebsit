@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Teachers List</h2>


        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Identity Number</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Address</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>


            @foreach($teachers as $teacher)

                <tr>
                    <td>{{$teacher->id}}</td>
                    <td><a href="{{route('teacher-edit', $teacher->id)}}">{{$teacher->name}}</a></td>
                    <td>{{$teacher->id_number}}</td>
                    <td>{{$teacher->phone_number}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->address}}</td>
                    <td>{{$teacher->created_at}}</td>
                    <td>{{$teacher->updated_at}}</td>
                    <td>

                        <div>


                            {!! Form::model ($teacher,['method'=>'DELETE', 'action'=>['AdminTeachersController@destroyTeacher', $teacher->id], 'files'=>true]) !!}


                            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-lm-3 ', 'name'=>'send', 'id'=>'send']) !!}

                            {{Form::close()}}

                        </div>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div>

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop