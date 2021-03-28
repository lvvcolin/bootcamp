@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-left">
				<h2>{{$assignments->name}}</h2>
		</div>
		<div class="col-md-12">
			<div class="embed-responsive embed-responsive-16by9" style="border: 1px solid;">
    				<iframe class="embed-responsive-item" src="{{$assignments->video_url}}"></iframe>
  			</div>
				
		</div>
	</div>
</div>
@endsection