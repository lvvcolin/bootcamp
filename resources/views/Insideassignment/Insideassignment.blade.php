@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-left">
				<h2>{{$assignments->name}}</h2>
		</div>
		<div class="col-md-12">
			
			<div class="embed-responsive embed-responsive-16by9" style="border: 1px solid;">
			<iframe width="560" height="315" src="{{$assignments->image}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  			</div>
  			
				
		</div>
	</div>
</div>
@endsection
