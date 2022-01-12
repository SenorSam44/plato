@extends('admin.admin_layout')

@section('admin_content')
    <h1>Edit Review</h1>
    <hr>{{ Session::get('msg') }}<hr>

    @foreach($edit_reviews as $review)
    <form class="form-horizontal" action="{{URL::to('admin/reviews/'.$review->id)}}" method="post" enctype="multipart/form-data" name="editForm">
        {{csrf_field()}}
    <div class="form-group">
        <label class="control-label col-sm-2" for="user_name">User Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{$review->user_name}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="user_designation">User Designation:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="user_designation" name="user_designation" value="{{$review->user_designation}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="user_image">Profile Picture:</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id=user_image" name="user_image">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="category_description">Review Description:</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="review_description" name="review_description" required>{{$review->review_description}}</textarea>
        </div>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-2" for="rating">Rating:</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="rating" name="rating">
                    <option>Select Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                </select>
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

    <input type="hidden" name="inputId" value="{{$review->id}}">

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
    </form>

    <script>
        document.forms['editForm'].elements['rating'].value={{ $review->rating }}
        document.forms['editForm'].elements['publication_status'].value={{ $review->publication_status }}
    </script>
    @endforeach

@endsection
