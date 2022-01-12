@extends('admin.admin_layout')

@section('admin_content')
    <h1>Edit News</h1>

    <hr>
        {{ Session::get('msg') }}

    <hr>

    @foreach($edit_news as $news)
    <form class="form-horizontal" action="{{URL::to('admin/news/'.$news->id)}}" method="post" enctype="multipart/form-data" name="editForm">
    {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="news_title">News Headline:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="news_title" name="news_title" value="{{$news->news_title}}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="news_description">News Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="news_description" name="news_description" placeholder="Enter News Description in Details" required>{{$news->news_description}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="news_image">News Image:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="department_image" name="news_image" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="news_url">News Url:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="news_url" name="news_url" value="{{$news->news_url}}" >
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

        <input type="hidden" name="inputId" value="{{$news->id}}">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>

    <script>
        document.forms['editForm'].elements['publication_status'].value={{ $news->publication_status }}
    </script>
    @endforeach

@endsection
