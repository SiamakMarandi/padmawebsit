@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Levels List</h2>

        <div class="col-sm-6">
            {!! Form::open (['method'=>'POST', 'action'=>'AdminLevelsController@store']) !!}

            <div class="form-group">
                {!! Form::label('name','Name : ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Create Level', ['class'=>'btn btn-primary']) !!}

            </div>



                {!! Form::close() !!}


        </div>

        <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>



                @foreach($levels as $level)

                    <tr>
                        <td>{{$level->id}}</td>
                        <td><a href="{{route('level-edit', $level->id)}}">{{$level->name}}</a></td>
                        <td>{{$level->created_at}}</td>
                        <td>{{$level->updated_at}}</td>
                        <td>

                            <div>


                                {!! Form::model ($level,['method'=>'DELETE', 'action'=>['AdminLevelsController@destroyLevel', $level->id]]) !!}


                                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-lm-3 ', 'name'=>'send', 'id'=>'send']) !!}

                                {{Form::close()}}

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
    </div>
    <div >

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop