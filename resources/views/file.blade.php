@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>files</h1>
		</div>		
		<div class="col-md-12">
			<form action="{{route('create_file',[$course->id,$assignment->id])}}">
				@csrf
				@method('GET')
				<input type="file" name="file">
				<input hidden  value="{{$assignment->id}}" name="assignment_id">
				<input hidden  value="{{$user->id}}" name="user_id">
				<input type="submit" name="submit">
			</form>
		</div>
	</div>
</div>

@endsection