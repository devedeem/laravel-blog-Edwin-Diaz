@if(count($errors)>0)

    <div class="alert alert-danger">

        <ul>
            @foreach($errors->all() as $error)
                <li class="fa fa-warning">{{$error}}</li><br>
            @endforeach
        </ul>

    </div>


@endif
