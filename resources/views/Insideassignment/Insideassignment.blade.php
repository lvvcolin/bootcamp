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
	



		<div class="col-md-6 mt-5">
			<form method="post" action="{{route('create_reaction',[$course->id,$assignment->id])}}">
				@csrf
				@method('GET')
				<input class="form-control form-control-lg" type="text" placeholder="reacties" aria-label=".form-control-lg example" name="reacties">



				<input type="hidden" name="user_id" value="{{auth()->id()}}">
				<input type="hidden" name="assignment_id" value="{{$assignment->id}}">

				<input type="submit" name="submit" >
			</form>
		</div>
		<div class="col-md-12">
			<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
					@foreach($assignment->reactions as $reaction)
					<li class="list-group-item">
						<div class="row"> 
							<div class="col-md-12"> 
								{{ $reaction->user->name }}
							</div>
							<div class="col-md-12">
								{{$reaction->reacties}}
							</div>
						</div>
					</li>
					@endforeach
				</ul>

			</div>
		</div>
	</div>
</div>
@endsection
