@extends('layouts.admin')


@section('content')

    <h1>Media</h1>
    @if(Session::has('deleted_image'))

        <p class="bg bg-danger">{{session('deleted_image')}}</p>

    @endif

    <form action="delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}

        <div class="form-group">
            <select name="checkBoxArray[]" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all" class="btn btn-primary" value="Submit">
        </div>


    @if($photos)

        <table class="table table-hover">

            <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->file}}" alt="" height="50"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
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

    @endif
    </form>



    @endsection


@section('scripts')


    <script>
        $(document).ready(function () {

            $('#options').click(function () {

                if (this.checked){

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



        });

    </script>



    @endsection