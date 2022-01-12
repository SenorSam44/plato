@extends('admin.admin_layout')

@section('admin_content')
    <h1>Edit Member</h1>
    <hr>{{ Session::get('msg') }}

    @foreach($edit_member as $member)
    <form class="form-horizontal" action="{{URL::to('admin/members/'.$member->id)}}" method="post" enctype="multipart/form-data" name="editForm">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="member_name">Doctor Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="member_name" name="member_name" value="{{$member->member_name}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="doctor_designation">Designation:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="member_designation" name="member_designation" value="{{$member->member_designation}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="member_description">Doctor Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="doctor_description" name="member_description" required>{{$member->member_description}}</textarea>
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
        <input type="hidden" name="inputId" value="{{$member->id}}">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>


    <script>
     
        document.forms['editForm'].elements['publication_status'].value={{ $member->publication_status }}
    </script>
    @endforeach

@endsection
