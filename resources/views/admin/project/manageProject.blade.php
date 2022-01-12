@extends('admin.admin_layout')

@section('admin_content')
    <h1>Manage Project</h1>

    {{ Session::get('msg') }}

    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Project Name</th>
            <th>Project Category</th>
            <th>Project Description</th>

            <th>Address</th>
            <th>Land_area</th>
            <th>Occupation_type</th>
            <th>Classification</th>
            <th>No_of_stories</th>
            <th>No_of_car_parking</th>
            <th>Apartment_size</th>
            <th>No_of_apartment</th>
            <th>No_of_lifts</th>
            <th>No_of_stairs</th>
            <th>No_of_generator</th>
            <th>Water_reserve</th>


            <th>Start Date</th>
            <th>End Date</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
            <th>Image 4</th>
            <th>Image 5</th>
            <th>Image 6</th>
            <th>Image 7</th>
            <th>Image 8</th>
            <th>Image 9</th>
            <th>Image 10</th>
            <th>Image 11</th>
            <th>Image 12</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($projects as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->project_title }}</td>
                <td>{{ $project->category_id}}</td>
                <td>{{ $project->project_description}}</td>

                <td>{{ $project->address}}</td>
                <td>{{ $project->land_area}}</td>
                <td>{{ $project->occupation_type}}</td>
                <td>{{ $project->classification}}</td>
                <td>{{ $project->no_of_stories}}</td>
                <td>{{ $project->no_of_car_parking}}</td>
                <td>{{ $project->apartment_size}}</td>
                <td>{{ $project->no_of_apartment}}</td>
                <td>{{ $project->no_of_lifts}}</td>
                <td>{{ $project->no_of_stairs}}</td>
                <td>{{ $project->no_of_generator}}</td>
                <td>{{ $project->water_reserve}}</td>

                <td>{{ $project->start_date}}</td>
                <td>{{ $project->end_date}}</td>


                <td><img src="{{asset($project->project_image1)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image2)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image3)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image4)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image5)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image6)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image7)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image8)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image9)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image10)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image11)}}" style="height: 70px; width: 100px">
                </td>
                <td><img src="{{asset($project->project_image12)}}" style="height: 70px; width: 100px">
                </td>

                <td><?php if($project->publication_status == 1){ ?> <a style="color: green">Acive</a><?php } else{ ?> <a style="color: darkred">Deactive</a><?php } ?></td>
                <td>
                    <?php if($project->publication_status == 1 ){ ?>
                        <form method="post" action="{{URL::to('admin/deactivate-project')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$project->id}}">
                            <button style="color: red" class="glyphicon glyphicon-remove" type="submit"></button>
                        </form> 
                    <?php } else{?>
                    <form method="post" action="{{URL::to('admin/activate-project')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$project->id}}">
                            <button style="color: green" class="glyphicon glyphicon-ok" type="submit"></button>
                        </form>
                    <?php }?>

                    <form method="get" action="{{URL::to('admin/projects/'.$project->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$project->id}}">
                        <button style="color: blue" class="glyphicon glyphicon-edit" type="submit"></button>
                    </form> 

                    <form method="post" action="{{URL::to('admin/delete-project')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$project->id}}">
                        <button style="color: red" class="glyphicon glyphicon-trash" type="submit" onclick="return confirm('Are you sure to delete it?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>




@endsection
