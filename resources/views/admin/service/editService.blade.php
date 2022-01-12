@extends('admin.admin_layout')

@section('admin_content')
    <h1>Edit Service</h1>
    <hr>{{ Session::get('msg') }}<hr>

    @foreach($edit_services as $service)
    <form class="form-horizontal" action="{{URL::to('admin/services/'.$service->id)}}" method="post" enctype="multipart/form-data" name="editForm">
        {{csrf_field()}}
    <div class="form-group">
        <label class="control-label col-sm-2" for="service_name">Service Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="service_name" name="service_name" value="{{$service->service_name}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="service_description">Service Description:</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" id="service_description" name="service_description" required>{{$service->service_description}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="available_time">Available Time:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="available_time" name="available_time" value="{{$service->available_time}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="service_image">Service Image:</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="service_image" name="service_image">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="service_image2">Service Image 2:</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="service_image2" name="service_image2">
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

    <input type="hidden" name="inputId" value="{{$service->id}}">

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
    </form>

    <script>
        document.forms['editForm'].elements['publication_status'].value={{ $service->publication_status }}
    </script>

    @endforeach

@endsection
