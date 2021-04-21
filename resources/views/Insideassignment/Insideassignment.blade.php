@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-left">
			<h2>{{$assignments->name}}</h2>
		</div>
		<div class="col-md-12">
			
			<x-embed url="{{$assignments->youtube_link}}" />
  			
		</div>



		<div class="col-md-12 mt-2">
			<form method="post" action="{{route('startAssignment',[$course->id,$assignments->id])}}">
				@csrf
				@method('GET')
				<input type="submit" value="submit excercise" name="submit" class="btn btn-info">
			</form>
		</div>
	



		@foreach($user as $use)
		<div class="col-md-6 mt-5">
			<form method="post" action="{{route('create_reaction',[$course->id,$assignments->id])}}">
				@csrf
				@method('GET')
				<input class="form-control form-control-lg" type="text" placeholder="reacties" aria-label=".form-control-lg example" name="reacties">



				<input type="hidden" name="user_id" value="{{$use->id}}">
				<input type="hidden" name="assignment_id" value="{{$assignments->id}}">

				<input type="submit" name="submit" >
			</form>
		</div>
		@endforeach
		<div class="col-md-12">
			<div class="card" style="width: 18rem;">
				<ul class="list-group list-group-flush">
					@foreach($reactions as $reaction)
					<li class="list-group-item">
						<div class="row"> 
							<div class="col-md-12"> 
								{{$reaction->Getname()}}
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
