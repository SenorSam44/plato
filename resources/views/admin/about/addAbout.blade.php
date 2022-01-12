@extends('admin.admin_layout')

@section('admin_content')
    <h1>Add About</h1>

    <hr>
    {{ Session::get('msg') }}

    <hr>

    <form class="form-horizontal" action="{{URL::to('admin/abouts')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="about_title">About Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="about_title" name="about_title" placeholder="Enter About Title" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="about_description">About Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="about_description" name="about_description" placeholder="Enter About Description" required></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="about_image">About Image:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="about_image" name="about_image" required>
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

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>

    <!--- Include of Form validation code from Admin Error.blade.php-->


@endsection
