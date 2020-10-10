@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Sports List</h2>




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



                @foreach($sports as $sport)

                    <tr>
                        <td>{{$sport->id}}</td>
                        <td><a href="{{route('sport-edit', $sport->id)}}">{{$sport->name}}</a></td>
                        <td>{{$sport->created_at}}</td>
                        <td>{{$sport->updated_at}}</td>
                        <td>

                            <div>


                                {!! Form::model ($sport,['method'=>'DELETE', 'action'=>['AdminSportsController@destroySport', $sport->id], 'files'=>true]) !!}


                                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-lm-3 ', 'name'=>'send', 'id'=>'send']) !!}

                                {{Form::close()}}

                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>

    </div>
    <div >

        <div class="alert alert-success">{{ Session::get('unique_error_message') }}</div>

    </div>

@stop