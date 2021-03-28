@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add asiggnments</button>
        </div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="{{route('create_assignments',[$course->id])}}">
                    @csrf
                     @method('GET')
                    <div class="inner-form">
                        <input type="hidden" value="{{$course->id}}" name="course_id">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                            <h1>Add asiggnments</h1>
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
                            <label for="exampleInputEmail1">video</label>
                            <input type="file"  name="video_url" class="form-control" id="image" aria-describedby="=" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
         @foreach($assignments as $assignment)
        <div class="col-md-4">
            {{$assignment->name}}
        </div>
        @endforeach
    </div>
</div>
@endsection
