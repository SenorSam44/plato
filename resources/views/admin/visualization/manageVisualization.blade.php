@extends('admin.admin_layout')

@section('admin_content')
    <h1>Manage Visualization(Slider)</h1>

    {{ Session::get('msg') }}

    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Visualization Title</th>
            <th>Visualization Subtitle</th>
            <th>Visualization Redirect Link</th>
            <th>Image</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($visualizations as $visualization)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $visualization->visualization_title }}</td>
                <td>{{ $visualization->visualization_subtitle }}</td>
                <td>{{ $visualization->visualization_redirect_link }}</td>
                <td><img src="{{asset($visualization->visualization_image)}}" style="height: 70px; width: 100px;"></td>
                <td><?php if($visualization->publication_status == 1){ ?> <a style="color: green">Active</a><?php } else{ ?> <a style="color: darkred">Deactive</a><?php } ?></td>
                <td>
                    <?php if($visualization->publication_status == 1 ){ ?>
                        <form method="post" action="{{URL::to('admin/deactivate-visualization')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$visualization->id}}">
                            <button style="color: red" class="glyphicon glyphicon-remove" type="submit"></button>
                        </form>
                    <?php } else{?>
                    <form method="post" action="{{URL::to('admin/activate-visualization')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$visualization->id}}">
                            <button style="color: green" class="glyphicon glyphicon-ok" type="submit"></button>
                        </form>
                    <?php }?>

                    <form method="get" action="{{URL::to('admin/visualizations/'.$visualization->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$visualization->id}}">
                        <button style="color: blue" class="glyphicon glyphicon-edit" type="submit"></button>
                    </form>

                    <form method="post" action="{{URL::to('admin/delete-visualization')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$visualization->id}}">
                        <button style="color: red" class="glyphicon glyphicon-trash" type="submit" onclick="return confirm('Are you sure to delete it?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>




@endsection
