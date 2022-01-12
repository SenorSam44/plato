@extends('admin.admin_layout')

@section('admin_content')
    <h1>Edit About</h1>
    <hr>{{ Session::get('msg') }}

    @foreach($edit_about as $about)
    <form class="form-horizontal" action="{{URL::to('admin/abouts/'.$about->id)}}" method="post" enctype="multipart/form-data" name="editForm">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="banner_title">About Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="about_title" name="about_title" value="{{$about->about_title}}" required>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="about_description">About Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="about_description" name="about_description" required>{{$about->about_description}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="about_image">About Image:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="about_image" name="about_image" >
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
        <input type="hidden" name="inputId" value="{{$about->id}}">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>
    @endforeach


    <script>
        document.forms['editForm'].elements['publication_status'].value={{ $about->publication_status }}
    </script>

@endsection
