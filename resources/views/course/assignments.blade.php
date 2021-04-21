@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if(Auth::User()->moderator() || Auth::User()->teacher())
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add asiggnments</button>
            </div>
        @endif
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="{{route('create_assignments',[$course->id])}}" enctype="multipart/form-data">
                    @csrf
                     @method('GET')
                    <div class="inner-form" style="padding: 30px">
                        <input type="hidden" value="{{$course->id}}" name="course_id">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                            <h1>Add assignments</h1>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text"  name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">youtube_link</label>
                            <input type="text"  name="youtube_link" class="form-control" placeholder="enter a url" id="image" aria-describedby="=" >
                            <div id="emailHelp" class="form-text">past a youtube url instead of a video</div>
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thumbnail</label>
                            <input type="file"  name="avatar" class="form-control" placeholder="enter a url" id="image" aria-describedby="=" required>
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
           <div class="col-md-12">
            <img src="{{$assignment->avatar}}" alt="" class="" style="height: 167px;
    width: 100%!important;">
             
            </div>
            <div class="col-md-12">
               <a href="{{url('/course/'. $course->id . '/assignments/' . $assignment->id )}}">Check out</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
