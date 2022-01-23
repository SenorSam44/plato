@extends('admin.admin_layout')

@section('admin_content')
    <h1>Manage Advisor</h1>

    {{ Session::get('msg') }}

    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Advisor Name</th>
            <th>Designation</th>
            <th>Description</th>
            <th>Profile Picture</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($advisors as $advisor)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $advisor->advisor_name }}</td>
                <td>{{ $advisor->advisor_designation}}</td>
                <td>{{ $advisor->advisor_description}}</td>
                <td><img src="{{asset($advisor->advisor_image)}}" style="height: 70px; width: 100px"></td>

                <td><?php if($advisor->publication_status == 1){ ?> <a style="color: green">Active</a><?php } else{ ?> <a style="color: darkred">Deactive</a><?php } ?></td>
                <td>
                    <?php if($advisor->publication_status == 1 ){ ?>
                        <form method="post" action="{{URL::to('admin/deactivate-advisor')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$advisor->id}}">
                            <button style="color: red" class="glyphicon glyphicon-remove" type="submit"></button>
                        </form>
                    <?php } else{?>
                    <form method="post" action="{{URL::to('admin/activate-advisor')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$advisor->id}}">
                            <button style="color: green" class="glyphicon glyphicon-ok" type="submit"></button>
                        </form>
                    <?php }?>

                    <form method="get" action="{{URL::to('admin/advisors/'.$advisor->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$advisor->id}}">
                        <button style="color: blue" class="glyphicon glyphicon-edit" type="submit"></button>
                    </form>

                    <form method="post" action="{{URL::to('admin/delete-advisor')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$advisor->id}}">
                        <button style="color: red" class="glyphicon glyphicon-trash" type="submit" onclick="return confirm('Are you sure to delete it?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>




@endsection
