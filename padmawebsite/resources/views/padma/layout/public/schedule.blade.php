@extends('padma.layout.master')
<script src="js/vendor/jquery-2.2.4.min.js"></script>
@section('header')

@stop

@section('banner')
<div>

</div>

@stop

@section('content1')


    <section>
        <section class="schedule-area section-gap">
           {{-- <img class="featured-img img-fluid" src="{{ URL::to('/images/img/featured-class/feature-img.png') }}" alt="">--}}
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center">
                            <h1>Schedule your Fitness Process</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="table-wrap col-lg-12">
                        <table class="schdule-table table table-bordered  align-center ">
                            <thead class="thead-light justify-content-center">
                            <tr>
                                <th class="head" scope="col">نام رشته</th>
                                <th class="head" scope="col">شنبه</th>
                                <th class="head" scope="col">یکشنبه</th>
                                <th class="head" scope="col">دوشنبه</th>
                                <th class="head" scope="col">سه شنبه</th>
                                <th class="head" scope="col">جهارشنبه</th>
                                <th class="head" scope="col">پنجشنبه</th>
                                <th class="head" scope="col">جمعه</th>
                                <th class="head" scope="col">نام مربی</th>
                                <th class="head" scope="col">سطح کلاس</th>
                                <th class="head" scope="col">توضیحات</th>
                            </tr>
                            </thead>
                            @foreach($timetables as $timetable)
                            <tbody>
                            <tr>
                                <th class="name" scope="row">{{$timetable->sport->name}}</th>
                                <td class="align-content-between">
                                    <div>{{$timetable->saturday_from}}</div>
                                    <div>{{$timetable->saturday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->sunday_from}}</div>
                                    <div>{{$timetable->sunday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->monday_from}}</div>
                                    <div>{{$timetable->monday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->tuesday_from}}</div>
                                    <div>{{$timetable->tuesday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->wednesday_from}}</div>
                                    <div>{{$timetable->wednesday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->thursday_from}}</div>
                                    <div>{{$timetable->thursday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->friday_from}}</div>
                                    <div>{{$timetable->friday_to}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->teacher->name}}</div>

                                </td>
                                <td>
                                    <div>{{$timetable->level->name}}</div>


                                </td>
                                <td>
                                    <div>{{$timetable->description}}</div>

                                </td>

                            </tr>


                            </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </section>
        @stop

