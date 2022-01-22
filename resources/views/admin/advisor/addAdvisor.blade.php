@extends('admin.admin_layout')

@section('admin_content')
    <h1>Add Advisor</h1>

    <hr>
        {{ Session::get('msg') }}

    <hr>

    <form class="form-horizontal" action="{{URL::to('admin/advisors')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="doctor_name">Team Advisor Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="advisor_name" name="advisor_name" placeholder="Enter Advisor Name" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="advisor_designation">Designation:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="advisor_designation" name="advisor_designation" placeholder="Enter Advisor Designation" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="advisor_description">Advisor Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="advisor_description" name="advisor_description" placeholder="Enter Advisor Description" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="advisor_image">Profile Picture:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="advisor_image" name="advisor_image">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="publication_status">Publication Status:</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="publication_status" name="publication_status">
                    <option disabled>Select Publication Status</option>
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
