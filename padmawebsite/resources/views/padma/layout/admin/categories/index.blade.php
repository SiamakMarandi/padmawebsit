@extends('padma.layout.admin.admin')

@section('content1')


    <div class="container">
        <h2>Categories List</h2>

        <div class="col-sm-6">
            {!! Form::open (['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

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



                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('category-edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>

                            <div>


                                {!! Form::model ($category,['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroyCategory', $category->id], 'files'=>true]) !!}


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