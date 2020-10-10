@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Categories List</h2>

        <div class="col-sm-6">
            {!! Form::open (['method'=>'POST', 'action'=>'AdminRolesController@store']) !!}

            <div class="form-group">
                {!! Form::label('name','Name : ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}

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



                @foreach($roles as $role)

                    <tr>
                        <td>{{$role->id}}</td>
                        <td><a href="{{route('role-edit', $role->id)}}">{{$role->name}}</a></td>
                        <td>{{$role->created_at}}</td>
                        <td>{{$role->updated_at}}</td>
                        <td>

                            <div>


                                {!! Form::model ($role,['method'=>'DELETE', 'action'=>['AdminRolesController@destroyRole', $role->id], 'files'=>true]) !!}


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

    <div class="alert alert-danger">

        {{ Session::get('unique_error_message') }}

    </div>
    @include('padma.layout.includes.form_errors')

@stop