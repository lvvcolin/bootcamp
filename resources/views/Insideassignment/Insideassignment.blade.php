@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-left">
			<h1 class="text-5xl">{{$assignment->name}}</h1>
		</div>
		<div class="col-md-12 text-left">
			<p>{{$assignment->description}}</p>
		</div>
		<div class="col-md-12">

			<x-embed url="{{$assignment->youtube_link}}" />

		</div>



		<div class="col-md-12 mt-2">
			<form method="post" action="{{route('startAssignment',[$course->id,$assignment->id])}}">
				@csrf
				@method('GET')
				<input type="submit" value="submit excercise" name="submit" class="btn btn-info">
			</form>
		</div>


	</div>
</div>
<reactions :auth_user="{{ auth()->user() }}" :assignment="{{ $assignment }}"></reactions>
@endsection