@extends('admin.admin_layout')

@section('admin_content')
    <h1>Add Project</h1>
    <hr>
        {{ Session::get('msg') }}
    <hr>
           
    <form class="form-horizontal" action="{{URL::to('admin/projects')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-sm-2" for="project_title">Project Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="project_title" name="project_title" placeholder="Enter Project Title" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">Category:</label>
            <div class="col-sm-10">

                <?php $categories = DB::table('categories')
                    ->where('publication_status',1)
                    ->get();
                ?>

                <select type="text" class="form-control" id="category_id" name="category_id" required>
                    <option value="0">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="project_description">Project Description:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="project_description" name="project_description" placeholder="Enter Project Description"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
            </div>

            <label class="control-label col-sm-2" for="land_area">Land Area:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="land_area" name="land_area" placeholder="Enter Land Area" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="occupation_type">Occupation Type:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="occupation_type" name="occupation_type" placeholder="Enter Occupation Type" required>
            </div>

            <label class="control-label col-sm-2" for="classification">Classification:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="classification" name="classification" placeholder="Enter Classification" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="no_of_stories">No. of Stories:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_stories" name="no_of_stories" placeholder="Enter No. of Stories" required>
            </div>

            <label class="control-label col-sm-2" for="no_of_car_parking">No. of Car Parking:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_car_parking" name="no_of_car_parking" placeholder="Enter No. of Car Parking" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="apartment_size">Apartment Size:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="apartment_size" name="apartment_size" placeholder="Enter Apartment Size" required>
            </div>

            <label class="control-label col-sm-2" for="no_of_apartment">No. of Apartment:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_apartment" name="no_of_apartment" placeholder="Enter No of Apartment" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="no_of_lifts">No. of Lifts:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_lifts" name="no_of_lifts" placeholder="Enter No. of Lifts" required>
            </div>

            <label class="control-label col-sm-2" for="no_of_stairs">No. of Stairs:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_stairs" name="no_of_stairs" placeholder="Enter No. of Stairs" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="no_of_generator">No. of Generator:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="no_of_generator" name="no_of_generator" placeholder="Enter No. of Generator" required>
            </div>

            <label class="control-label col-sm-2" for="water_reserve">Water Reserve:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="water_reserve" name="water_reserve" placeholder="Enter Water Reserve" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="start_date">Start Date:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter Project Start Date">
            </div>

            <label class="control-label col-sm-2" for="end_date">End Date:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Enter Project End Date">
            </div>
        </div>

        <hr>

        <div class="form-group">
            <label class="control-label col-sm-2" for="project_image1">Picture 1:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image1" name="project_image1" required>
            </div>

            <label class="control-label col-sm-2" for="project_image2">Picture 2:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image2" name="project_image2">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="project_image3">Picture 3:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image3" name="project_image3">
            </div>

            <label class="control-label col-sm-2" for="project_image4">Picture 5:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image4" name="project_image4">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="project_image5">Picture 5:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image5" name="project_image5">
            </div>

            <label class="control-label col-sm-2" for="project_image6">Picture 6:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image6" name="project_image6">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="project_image7">Picture 7:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image7" name="project_image7">
            </div>

            <label class="control-label col-sm-2" for="project_image8">Picture 8:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image8" name="project_image8">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="project_image9">Picture 9:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image9" name="project_image9">
            </div>

            <label class="control-label col-sm-2" for="project_image10">Picture 10:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image10" name="project_image10">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="project_image11">Picture 11:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image11" name="project_image11">
            </div>

            <label class="control-label col-sm-2" for="project_image12">Picture 12:</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" id="project_image12" name="project_image12">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="publication_status">Publication Status:</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="publication_status" name="publication_status">
                    <option value="0">Select Publication Status</option>
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
