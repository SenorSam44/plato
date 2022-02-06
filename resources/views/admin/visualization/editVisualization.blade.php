@extends('admin.admin_layout')

@section('admin_content')
    <h1>@if(isset($visualization))
            Edit
        @else
            Add
        @endif
        Visualization</h1>
    <hr>{{ Session::get('msg') }}

    <form class="form-horizontal"
          action="{{isset($visualization)? URL::to('admin/visualizations/'.$visualization->id): URL::to('admin/visualizations')}}"
          method="post"
          enctype="multipart/form-data" name="editForm">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_title">Visualization Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="visualization_title" name="visualization_title"
                       placeholder="Enter Visualization Title"
                       value="{{$visualization->visualization_title?? ""}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_subtitle">Visualization Subtitle:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="visualization_subtitle" name="visualization_subtitle"
                       placeholder="Enter Visualization Subtitle"
                       value="{{$visualization->visualization_subtitle?? ""}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_redirect_link">Visualization Redirect Link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="visualization_redirect_link"
                       name="visualization_redirect_link"
                       placeholder="Enter Visualization Redirect Link"
                       value="{{$visualization->visualization_redirect_link ?? ""}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_description">Visualization Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="visualization_description"
                          name="visualization_description"
                          placeholder="Enter Visualization Description"
                          required>{{$visualization->visualization_description?? ""}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_video">Visualization Video:</label>
            @if(isset($visualization->visualization_video))
                <div class="col-sm-10">
                    <video width="320" height="240" controls>
                        <source src="{{URL::asset($visualization->visualization_video)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <input type="file" class="form-control" id="visualization_video" name="visualization_video">
                </div>
            @else
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="visualization_video" name="visualization_video"
                           required>
                </div>
            @endif
        </div>

        @if(isset($visualization) && isset($visualization->visualization_image))
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Visualization Image:</label>
                <div class="col-sm-10">
                    <img id="preview-image"
                         src="{{isset($visualization->visualization_image) && strlen($visualization->visualization_image)>3? asset($visualization->visualization_image): null}}"
                         alt="office logo preview" style="max-width: 100px; height: 100px; margin: 10px 0;">
                    <input type="file" class="form-control" id="image" name="visualization_image">
                </div>
            </div>
        @endif

        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_video">Gallery Image:</label>
            {{--            @if(isset($visualization->gallery_file))--}}
            {{--                <div class="col-sm-10">--}}
            {{--                    <video width="320" height="240" controls>--}}
            {{--                        <source src="{{URL::asset($visualization->gallery_file)}}" type="video/mp4">--}}
            {{--                        Your browser does not support the video tag.--}}
            {{--                    </video>--}}

            {{--                    <input type="file" class="form-control" id="visualization_video" name="visualization_video">--}}
            {{--                </div>--}}
            {{--            @else--}}
            {{--                <div class="col-sm-10">--}}
            {{--                    <input type="file" class="form-control" id="visualization_video" name="visualization_video" required>--}}
            {{--                </div>--}}
            {{--            @endif--}}
            <div class="col-sm-10 row">
                <div class="col-sm-12">
                    <div class="col-sm-10" style="margin-bottom: 5px; padding: 0">
                        <input type="file" class="form-control" name="gallery_file[]">
                    </div>
                    <div class="col-sm-2 text-right">
                        <button type="button" class="add-gallery-btn btn btn-info color-white">
                            Add
                        </button>
                    </div>
                </div>

                {{--                <div class="col-sm-4 text-right">--}}
                {{--                    <button class="btn btn-danger color-white">--}}
                {{--                        <i class="fa fa-times"></i>--}}
                {{--                    </button>--}}
                {{--                </div>--}}

            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="publication_status">Publication Status:</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="publication_status" name="publication_status">
                    <option>Select Publication Status</option>
                    <option
                        @if(isset($visualization->publication_status) && $visualization->publication_status==1) selected
                        @endif value="1">Published
                    </option>
                    <option
                        @if(isset($visualization->publication_status) && $visualization->publication_status==0) selected
                        @endif value="0">Unpublished
                    </option>
                </select>
            </div>
        </div>

        @if(isset($visualization))
            <input type="hidden" name="inputId" value="{{$visualization->id}}">
        @endif
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

        // document.querySelectorAll('.add-gallery-btn').forEach((addbtn) => {
        //     addbtn.parentElement.parentElement.append("<div class=\"offset-2 col-sm-8\">\n" +
        //         "                    <input type=\"file\" class=\"form-control\" name=\"gallery_file[]\">\n" +
        //         "                </div>" +
        //         "                <div class=\"col-sm-4 text-right\">\n" +
        //         "                    <button class=\"btn btn-danger color-white\">\n" +
        //         "                        <i class=\"fa fa-times\"></i>\n" +
        //         "                    </button>\n" +
        //         "                </div>" +
        //         "")
        // })

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

            //    add gallery image
            let i = 0;
            $('.add-gallery-btn').click((ele) => {
                i++;

                $(ele.target).parent().parent().append('<div class="gallery-field col-sm-12 row" style="margin: 5px 0; padding: 0">' +
                    '               <div class="col-sm-10" style="padding: 0">\n' +
                    '                    <input type="file" class="form-control" name="gallery_file[]">\n' +
                    '                </div>\n' +
                    '                <div class="col-sm-2 text-right" style="padding: 0">\n' +
                    '                    <button type="button" class="remove-gallery-btn btn btn-danger color-white">\n' +
                    '                        Remove\n' +
                    '                    </button>\n' +
                    '                </div>' +
                '               </div>')
            });

            $(document).on('click', '.remove-gallery-btn', (ele) => {
                i--;
                // $.parent().parent().parent().children().last().remove()
                $(ele.target).parent().parent().remove()

            })

        });

    </script>
@endsection
