@extends('layouts.admin')

@section('content')
<h1>Photos</h1>
<form action="delete/media" method="post">
        @csrf
        @method("DELETE")
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="" class="form-control">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" name="delete_all">
        </div>




@if($photos)
    <table class="table table-hover">
      <thead>
        <tr>
            <th><input class="checkbox" type="checkbox" id="options"></th>
          <th>Photo_id</th>
          <th>Name</th>
          <th>Created_at</th>
          <th>Updated_at</th>
        </tr>
      </thead>
      <tbody>
        @foreach($photos as $photo)

            <tr>
                <td><input class="checkBoxes checkbox" id="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>

                <td>{{$photo->id}}</td>
                <td><img height="100" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at ? $photo->created_at : ''}}</td>
                <td>{{$photo->updated_at ? $photo->updated_at : ''}}</td>
                <td>
                    <input type="hidden" name="photo" value="{{$photo->id}}">
                    <div class="form-group">
                        <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                    </div>
                </td>
            </tr>

        @endforeach
      </tbody>
    </table>

    </form>
@endif


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

$(document).ready(function () {
   $('#options').click(function(){

       if(this.checked)
       {
           $('.checkBoxes').each(function () {
               this.checked = true;
           })
       }
       else {
           $('.checkBoxes').each(function () {
               this.checked = false;
           })
       }

   })
})



    </script>
@endsection
