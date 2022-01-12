@extends('admin.admin_layout')

@section('admin_content')
    <h1>Manage Category</h1>

    {{ Session::get('msg') }}

    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Image</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($categories as $category)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_description}}</td>
                <td><img src="{{ asset($category->category_image) }}" alt="Image" style="height: 70px; width: 100px"></td>
                <td><?php if($category->publication_status == 1){ ?> <a style="color: green">Active</a><?php } else{ ?> <a style="color: darkred">Deactive</a><?php } ?></td>
                <td>
                    <?php if($category->publication_status == 1 ){ ?>
                        <form method="post" action="{{URL::to('admin/deactivate-category')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$category->id}}">
                            <button style="color: red" class="glyphicon glyphicon-remove" type="submit"></button>
                        </form> 
                    <?php } else{?>
                    <form method="post" action="{{URL::to('admin/activate-category')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$category->id}}">
                            <button style="color: green" class="glyphicon glyphicon-ok" type="submit"></button>
                        </form>
                    <?php }?>

                    <form method="get" action="{{URL::to('admin/categories/'.$category->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$category->id}}">
                        <button style="color: blue" class="glyphicon glyphicon-edit" type="submit"></button>
                    </form> 

                    <form method="post" action="{{URL::to('admin/delete-category')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$category->id}}">
                        <button style="color: red" class="glyphicon glyphicon-trash" type="submit" onclick="return confirm('Are you sure to delete it?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>




@endsection
