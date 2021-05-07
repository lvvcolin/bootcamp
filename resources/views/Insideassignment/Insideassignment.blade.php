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



		{{-- // method="post" action="{{route('create_reaction',[$course, $assignment])}} --}}
		<div class="col-md-6 mt-5">
			<form id="postReactionForm">
				<input type="hidden" name="course_id" id="reactionCourse" value="{{ $course->id }}">
				<input type="hidden" name="user_id" id="reactionUser" value="{{auth()->id()}}">
				<input type="hidden" name="assignment_id" id="reactionAssignment" value="{{$assignment->id}}">

				<input class="form-control form-control-lg" type="text" placeholder="message"
					aria-label=".form-control-lg example" name="message" id="reactionMessage">


				<input type="submit" value="submit">
			</form>
		</div>
		<h1>NIEUW</h1>
		<div id="reactions"></div>


		<h1>OUD</h1>

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
								{{$reaction->message}}
							</div>
						</div>
					</li>
					@endforeach
				</ul>

			</div>
		</div>
	</div>
</div>
<script>
	document.getElementById('postReactionForm').addEventListener('submit', postReaction);
	document.getElementById('postReactionForm').addEventListener('submit', loadReactions);

	function postReaction(e) {
        e.preventDefault();
		
		// data
        var user = document.getElementById('reactionUser').value;
        var assignment = document.getElementById('reactionAssignment').value;
        var message = document.getElementById('reactionMessage').value;
        var course = document.getElementById('reactionCourse').value;
        var params = "user_id="+user+"&assignment_id="+assignment+"&message="+message;
		
		// route
		var wildCards =  course, assignment; 
		var uri = "/reactions/create"
		
		
        var xhr = new XMLHttpRequest(), token = document.querySelector('meta[name="csrf-token"]').content;
        xhr.open('POST', wildCards+uri, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
		
		xhr.send(params);
		
		
	}
	
	
	
    function loadReactions(){
		var xhr = new XMLHttpRequest();
		
		var assignment = document.getElementById('reactionAssignment').value;
		var course = document.getElementById('reactionCourse').value;
		
		var wildCards =  course, assignment; 
		var uri = "/reactions"
        xhr.open('GET', wildCards+uri, true);
		
        xhr.onload = function(){
            if(this.status == 200){
                var reactions = JSON.parse(this.responseText);
                var output = '';

				for(var i in reactions){
				output += '<ul>' +
					'<li>ID: '+reactions[i].id+'</li>' +
					'<li>message : '+reactions[i].message+'</li>' +

					'</ul>';
				}
                document.getElementById('reactions').innerHTML = output;
				console.log(output)

            }
        }

        xhr.send();
    }



	
</script>
@endsection