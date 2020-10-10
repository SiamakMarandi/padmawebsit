@extends('padma.layout.admin.admin')

@section('content1')

   {{-- <div class="alert alert-success">{{ Session::get('delete_user') }}</div>--}}

    <div class="container">
        <h2>Users List</h2>
        <form action="user/delete" method="post" class="form-inline">
{{csrf_field()}}
            {{method_field('delete')}}

        <div class="form-group">

            <select name="checkBoxArray" id="" class="checkbox-inline">
                <option value="">Delete</option>
            </select>
        </div>

        <div class="form-group">

            <input type="submit" name="delete_all" class="btn btn-danger" value="Delete Items">
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($users)

                @foreach($users as $user)

                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$user->id}}"></td>
                        <td>{{$user->id}}</td>

                        @if($user->user_photo)
                            <td><a href="{{route('user-edit', $user->id)}}"><img height="50" src="/images/users/{{$user->User_Photo->photo_path}}" alt="'"></a></td>
                        @else
                            <td><a href="{{route('user-edit', $user->id)}}"><img height="50" src="{{ $user->non_photo()}}" alt="picture" ></a></td>
                        @endif

                        <td><a href="{{route('user-edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->phone_no}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->Role->name}}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </form>
    </div>


    <script>

        $(document).ready(function () {

            $('#options').click(function () {

                if(this.checked) {

                    $('.checkBoxes').each(function () {

                        this.checked = true;

                    });

                }

                else {

                    $('.checkBoxes').each(function () {

                        this.checked = false;

                    });

                }


            });



        });
        

    </script>

@stop