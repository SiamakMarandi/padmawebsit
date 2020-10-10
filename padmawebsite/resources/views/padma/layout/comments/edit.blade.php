@extends('padma.layout.admin.admin')

@section('content1')

    {!! Form::model ($comment,['method'=>'PATCH', 'action'=>['PostCommentsController@updateComment', $comment->id]]) !!}

    <div class="form-group">
        {!! Form::label('body','Edit The Reply : ') !!}
        {!! Form::textarea('body',null,['class'=>'form-control', 'rows'=>1]) !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}

@endsection