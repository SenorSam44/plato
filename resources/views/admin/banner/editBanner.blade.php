@extends('admin.admin_layout')

@section('admin_content')
    <h1>@if(isset($banner))
            Edit
        @else
            Add
        @endif
        Banner</h1>
    <hr>{{ Session::get('msg') }}

    <form class="form-horizontal"
          action="{{isset($banner)? URL::to('admin/banners/'.$banner->id): URL::to('admin/banners')}}" method="post"
          enctype="multipart/form-data" name="editForm">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="banner_title">Slider Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="banner_title" name="banner_title"
                       placeholder="Enter Slider Title"
                       value="{{$banner->banner_title?? ""}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="banner_date">Slider Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="banner_date" name="banner_date"
                       value="{{$banner->banner_date ?? ""}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="banner_redirect_link">Slider Redirect Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="banner_redirect_link" name="banner_redirect_link"
                       placeholder="Enter Slider Redirect Link"
                       value="{{$banner->banner_redirect_link ?? ""}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="banner_description">Slider Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="banner_description" name="banner_description"
                          placeholder="Enter Slider Description"
                          required>{{$banner->banner_description?? ""}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="banner_video">Slider Video:</label>
            @if(isset($banner->banner_video))
                <div class="col-sm-10">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset($banner->banner_video)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <input type="file" class="form-control" id="banner_video" name="banner_video">
                </div>
            @else
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="banner_video" name="banner_video" required>
                </div>
            @endif
        </div>

        {{--        @if(isset($banner) && isset($banner->video) && strlen($banner->image)<3)--}}
        {{--        <div class="form-group">--}}
        {{--            <label class="control-label col-sm-2" for="banner_video">Slider Video:</label>--}}
        {{--            <div class="col-sm-10">--}}
        {{--                <input type="file" class="form-control" id="banner_video" name="banner_video" required>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        @else--}}
        @if(isset($banner) && isset($banner->banner_video))
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Slider Image:</label>
                <div class="col-sm-10">
                    <img id="preview-image"
                         src="{{isset($banner->banner_image) && strlen($banner->banner_image)>3? asset($banner->banner_image): null}}"
                         alt="office logo preview" style="max-width: 100px; height: 100px; margin: 10px 0;">
                    <input type="file" class="form-control" id="image" name="banner_image">
                </div>
            </div>
        @endif

        <div class="form-group">
            <label class="control-label col-sm-2" for="publication_status">Publication Status:</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="publication_status" name="publication_status">
                    <option>Select Publication Status</option>
                    <option @if(isset($banner->publication_status) && $banner->publication_status==1) selected
                            @endif value="1">Published
                    </option>
                    <option @if(isset($banner->publication_status) && $banner->publication_status==0) selected
                            @endif value="0">Unpublished
                    </option>
                </select>
            </div>
        </div>

        @if(isset($banner))
            <input type="hidden" name="inputId" value="{{$banner->id}}">
        @endif
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function (e) {
            if (!$('#preview-image').attr('src')) {
                $('#preview-image').css("display", "none");
            }

            $('#image').change(function () {
                $('#preview-image').css("display", "block");

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });

    </script>
@endsection
