@if(count($errors) > 0)

    <div class="alert alert-danger">

        <ul>

            @foreach($errors->all() as $error)

                <li>{{$error}}</li>


            @endforeach


        </ul>


    </div>
    @elseif(Session::has('message'))
    <div >{{ Session::get('message') }}</div>







@endif