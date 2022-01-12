@extends('admin.admin_layout')

@section('admin_content')
    <h1>Edit Category</h1>

    <hr>
        {{ Session::get('msg') }}

    <hr>

    @foreach($edit_category as $category)
    <form class="form-horizontal" action="{{URL::to('admin/categories/'.$category->id)}}" method="post" enctype="multipart/form-data" name="editForm">
        {{csrf_field()}}
    <div class="form-group">
        <label class="control-label col-sm-2" for="category_name">Category Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="category_description">Category Description:</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="category_description" name="category_description" required>{{$category->category_description}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="category_image">Category Image:</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="category_image" name="category_image">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="publication_status">Publication Status:</label>
        <div class="col-sm-10">
            <select type="text" class="form-control" id="publication_status" name="publication_status">
                <option>Select Publication Status</option>
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
    </div>

    <input type="hidden" name="inputId" value="{{$category->id}}">

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
    </form>
    @endforeach

    <script>
        document.forms['editForm'].elements['publication_status'].value={{ $category->publication_status }}
    </script>
@endsection
