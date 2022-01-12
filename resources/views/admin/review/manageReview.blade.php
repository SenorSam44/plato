@extends('admin.admin_layout')

@section('admin_content')
    <h1>Manage Reviews</h1>

    {{ Session::get('msg') }}

    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>User Name</th>
            <th>User Designation</th>
            <th>Profile Picture</th>
            <th>Review Description</th>
            <th>Rating</th>
            <th>Time</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($reviews as $review)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $review->user_name }}</td>
                <td>{{ $review->user_designation }}</td>
                <td><img src="{{asset($review->user_image)}}" style="height: 70px; width: 100px">
                </td>
                <td>{{ $review->review_description}}</td>
                <td>{{ $review->rating}}</td>
                <td>{{ $review->created_at}}</td>
                <td><?php if($review->publication_status == 1){ ?> <a style="color: green">Active</a><?php } else{ ?> <a style="color: darkred">Deactive</a><?php } ?></td>
                <td>
                    <?php if($review->publication_status == 1 ){ ?>
                        <form method="post" action="{{URL::to('admin/deactivate-review')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$review->id}}">
                            <button style="color: red" class="glyphicon glyphicon-remove" type="submit"></button>
                        </form> 
                    <?php } else{?>
                    <form method="post" action="{{URL::to('admin/activate-review')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$review->id}}">
                            <button style="color: green" class="glyphicon glyphicon-ok" type="submit"></button>
                        </form>
                    <?php }?>

                    <form method="get" action="{{URL::to('admin/reviews/'.$review->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$review->id}}">
                        <button style="color: blue" class="glyphicon glyphicon-edit" type="submit"></button>
                    </form> 

                    <form method="post" action="{{URL::to('admin/delete-review')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$review->id}}">
                        <button style="color: red" class="glyphicon glyphicon-trash" type="submit" onclick="return confirm('Are you sure to delete it?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>




@endsection
