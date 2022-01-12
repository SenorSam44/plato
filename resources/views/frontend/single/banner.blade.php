@extends('frontend.home_layout')

@section('content')

<div class="container">
	<div class="main-content">
		<h1>Banners</h1>
		@foreach($banners as $data)
		<h1>{{$data->banner_title}}</h1>
		@endforeach
	</div>
</div>

<style type="text/css">
	
	.template-main-menu a{
		        color: black !important;
		    }

</style>
    



@endsection