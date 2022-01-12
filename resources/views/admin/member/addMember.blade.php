@extends('admin.admin_layout')

@section('admin_content')
    <h1>Add Team Member</h1>

    <hr>
        {{ Session::get('msg') }}

    <hr>

    <form class="form-horizontal" action="{{URL::to('admin/members')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="doctor_name">Team Member Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Enter Team member Name" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="member_designation">Designation:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="member_designation" name="member_designation" placeholder="Enter Member Designation" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="member_description">Member Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="member_description" name="member_description" placeholder="Enter Member Description" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="member_image">Profile Picture:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="member_image" name="member_image">
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
