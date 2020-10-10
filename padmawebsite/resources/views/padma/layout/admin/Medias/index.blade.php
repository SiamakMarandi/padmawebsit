@extends('padma.layout.admin.admin')

@section('content1')

    <h1>Media</h1>


    @if($photos)

        <form action="delete/media" method="post" class="form-inline">


            {{csrf_field()}}
            {{method_field('delete')}}

            <div class="form-group">

                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>

            <div class="form-group">

                <input type="submit" name="delete_all" class="btn btn-primary">
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Created</th>
                    <th>Updated</th>

                </tr>
                </thead>
                <tbody>


                @foreach($photos as $photo)

                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}">
                        </td>
                        <td>{{$photo->id}}</td>
                        <td>{{$photo->photo_path}}</td>
                        <td><img height="50" src="/images/photos/{{$photo->photo_path}}" alt=""></td>
                        <td>{{$photo->created_at}}</td>
                        <td>{{$photo->updated_at}}</td>
                        <td>

                            <input type="hidden" name="photo" value="{{$photo->id}}">

                            <div class="form-group">

                                <input type="submit" name="delete_single" value="Delete" class="btn btn-danger ">

                            </div>

                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>

        </form>

    @endif



    <div class="row">

        <div class="alert alert-success">{{ Session::get('delete_photo') }}</div>

    </div>

    <script>

        $(document).ready(function () {
            $('#options').click(function () {
                if (this.checked) {
                    $('.checkBoxes').each(function () {

                        this.checked = true;

                    });
                }
                else{

                    $('.checkBoxes').each(function () {

                        this.checked = false;
                    });
                }

            });

        });

    </script>
@stop
