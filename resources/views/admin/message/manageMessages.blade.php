@extends('admin.admin_layout')

@section('admin_content')
    <h1>All Inbox Messages</h1>

    {{ Session::get('msg') }}

    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Client Name</th>
            <th>Subject</th>
            <th>Phone</th><th>Email</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 0;
        ?>
        @foreach($messages as $message)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $message->user_name }}</td>
                <td>{{ $message->subject }}</td>
                <td>{{ $message->phone}}</td>
                <td>{{ $message->email}}</td>
                <td>{{ $message->message}}</td>
                <td><?php if($message->publication_status == 1){ ?> <a style="color: gray;">Seen</a><?php } else{ ?> <a style="color: green">New</a><?php } ?></td>
                <td>
                    <?php if($message->publication_status == 1 ){ ?>
                        <form method="post" action="{{URL::to('admin/deactivate-message')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$message->id}}">
                            <button style="color: red" class="glyphicon glyphicon-remove" type="submit"></button>
                        </form> 
                    <?php } else{?>
                    <form method="post" action="{{URL::to('admin/activate-message')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="inputId" value="{{$message->id}}">
                            <button style="color: green" class="glyphicon glyphicon-ok" type="submit"></button>
                        </form>
                    <?php }?> 

                    <form method="post" action="{{URL::to('admin/delete-message')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="inputId" value="{{$message->id}}">
                        <button style="color: red" class="glyphicon glyphicon-trash" type="submit" onclick="return confirm('Are you sure to delete it?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>




@endsection
