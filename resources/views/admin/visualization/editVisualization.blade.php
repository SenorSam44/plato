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
                    <img class="preview-image"
                         src="{{isset($visualization->visualization_image) && strlen($visualization->visualization_image)>3? asset($visualization->visualization_image): null}}"
                         alt="office logo preview" style="max-width: 100px; height: 100px; margin: 10px 0;">
                    <input type="file" class="form-control" id="image" name="visualization_image">
                </div>
            </div>
        @endif

        <div class="form-group">
            <label class="control-label col-sm-2" for="visualization_video">Gallery Image:</label>
            @if(isset($visualization->gallery_file))
                @foreach(unserialize($visualization->gallery_file) as $gallery_file)
                    <div class="dynamic-gallery-image col-sm-10 row">
                        @if(strpos($gallery_file, '.mkv') || strpos($gallery_file, '.mp4') || strpos($gallery_file, '.web'))
                            <video data-name="{{$gallery_file}}" class="col-sm-10" width="320" height="240" controls>
                                <source src="{{URL::asset($gallery_file)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img data-name="{{$gallery_file}}"
                                 class="col-sm-12 preview-image"
                                 src="{{isset($gallery_file) && strlen($gallery_file)>3? asset($gallery_file): null}}"
                                 alt="office logo preview" style="max-width: 100px; height: 100px; margin: 10px 0;"/>
                        @endif

                        <div class="col-sm-10 text-right" style="padding: 0; margin: 4rem">
                            <button type="button" class="remove-gallery-btn btn btn-danger color-white">
                                Remove
                            </button>
                        </div>
                        <input type="file" class="form-control col-sm-10" name="gallery_file[]"
                               value="{{$gallery_file}}">
                    </div>
                @endforeach
            @endif
            <div class="dynamic-gallery-image col-sm-10 row" style="margin-top: 1em; padding: 0">
                <img class="col-sm-12 preview-image"
                     src=""
                     alt="office logo preview" style="max-width: 100px; height: 100px; margin: 10px 0;"/>

                <div class="col-sm-12">
                    <div class="col-sm-10" style="margin-bottom: 5px; padding: 0">
                    </div>
                    <div class="col-sm-2 text-right">
                        <button type="button" class="add-gallery-btn btn btn-info color-white">
                            Add
                        </button>
                    </div>
                </div>

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

    <style>
        @media (min-width: 729px) {
            .dynamic-gallery-image {
                margin-left: 12.5vw;
            }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        get_preview()
        remove_btn_listener();
        preview_none();

        function remove_btn_listener() {

            document.querySelectorAll('.remove-gallery-btn').forEach((removeBtn) => {
                let parent_ele = removeBtn.parentElement.parentElement;
                let dataName = ''
                if (parent_ele.querySelector('img'))
                    dataName = parent_ele.querySelector('img').getAttribute('data-name')
                else
                    dataName = parent_ele.querySelector('video').getAttribute('data-name')

                removeBtn.addEventListener('click', () => {
                    removeBtn.parentElement.parentElement.remove();
                    $('form').append('<input type="hidden" ' +
                        'id="removed_file" name="removed_file[]" ' +
                        'value="'+dataName+'">');
                }, false)
            })
        }

        function preview_none() {
            document.querySelectorAll('.preview-image').forEach(preview => {
                if (!preview.getAttribute('src')) {
                    preview.style.display = 'none'
                }
            })
        }

        function get_preview() {
            $(document).on('change', '.image-input', (ele) => {

                var j = $(ele.target).parent().parent().find('.preview-image')
                j.attr('src', URL.createObjectURL(ele.target.files[0]));
                j.css('display', 'block')
                console.log(j)
            })
        }

        $(document).ready(function (e) {
            // get_preview();

            //    add gallery image
            let i = 0;
            $('.add-gallery-btn').click((ele) => {
                i++;

                $(ele.target).parent().parent().append('<div class="dynamic-gallery-image gallery-field col-sm-12 row" style="margin: 5px 0; padding: 0">' +
                    '               <div class="col-sm-12">' +
                    '   `           <img class="preview-image"\n' +
                    '                     src=""\n' +
                    '                     alt="office logo preview" style="max-width: 100px; height: 100px; margin: 10px 0;"/>' +
                    '               </div>' +
                    '               <div class="col-sm-10" style="padding: 0">\n' +
                    '                    <input type="file" class="image-input form-control" name="gallery_file[]">\n' +
                    '                <div class="col-sm-2 text-right" style="padding: 0">\n' +
                    '                    <button type="button" class="remove-gallery-btn btn btn-danger color-white">\n' +
                    '                        Remove\n' +
                    '                    </button>\n' +
                    '                </div>' +
                    '                </div>\n' +
                    '               </div>')

                preview_none()
                remove_btn_listener()

            });

        });

    </script>
@endsection
