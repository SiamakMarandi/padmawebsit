@extends('padma.layout.master')






@section('content1')





@stop

@section('content2')

    <div class="post-container-body">

        <div class="row post-banner ">


        </div>

        <div class="row post-title-row">
            <article class="col-sm-2">
            </article>
            <article class="col-sm-8 post-container ">
                <article class="col-sm-3 post-container ">
                </article>
                <article class="col-sm-5 post-container ">
                @foreach($posts as $post)
                <section class="posts-title">{!! $post->title !!}</section>
                <section class="post-user">{!! $post->user->name !!}</section>
                <section class="post-date">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</section>
                <section class="post-line"></section>
                @foreach($post->categories as $category)

                    <button type="button" class="btn btn-success post-category">{!! $category->name !!}</button>
                @endforeach
                    @endforeach
            </article>
            <article class="col-sm-2">
            </article>
        </div>
        <div class="row">
            @if($post)

                {{-- <tr>

                     <td rowspan="3"><h1>PHOTO</h1></td>


                 </tr>
                 <tr>
                     <td class="td-title" height="80px">{!! $post->title !!}</td>
                 </tr>

                 <tr>

                     <td class="td-body" height="150px" width="70%">
                         {!! $post->body!!}

                     </td>

                 </tr>
                 <tr>
                     <td class="td-created">
                         <p>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}} </p>
                     </td>
                     <td class="td-category">
                         <p><a href="#">category</a> | <a href="#">{{$post->user->name}}</a></p>
                     </td>

                 </tr>
                 <tr>
                     <td colspan="2"><p class="body-border"></p></td>
                 </tr>--}}

                <article class="col-sm-2">
                </article>
                <article class="post-container  col-sm-8">


                    <section class="post-body">{!! $post->body !!}</section>

                </article>
                <article class="col-sm-2"></article>

            @endif
        </div>


    </div>

@stop