@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add project</button>
        </div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="/course/create" enctype="multipart/form-data">
                    @csrf
                     @method('GET')
                    <div class="inner-form">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                            <h1>Add project</h1>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">description</label>
                            <input type="text"  name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">image</label>
                            <input type="file"  name="image" class="form-control" id="image" aria-describedby="=" required>
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		@foreach($courses as $course)
			<div class="col-md-4">
                <div class="card">
    				<div class="col-md-6">
    					<a href="{{route('course_show',[$course->id])}}">{{$course->name}}</a>
    				</div>
    				<div class="col-md-12">
    					{{$course->description}}
    				</div>
    				<div class="col-md-12">
    				
                    <img src="{{$course->image}}" alt="" class="" width="150">
    				</div>
                </div>
			</div>
		@endforeach

	</div>
</div>

@endsection
