@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Auth::User()->moderator() || Auth::User()->teacher())
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add course</button>
        </div>
        @endif
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="POST" action="/course/create" enctype="multipart/form-data">
                    @csrf
                     @method('GET')
                    <div class="inner-form" style="padding: 39px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-l-12 col-xl-12 inner-text">
                            <h1>Add course</h1>
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
       @if ($loop->first)
       <div class="col-12 col-xs-12 col-sm-12 col-md-4">
        <div class="card-body">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('course_show',[$course->id])}}"><img src="{{$course->image}}" alt="" class="" style="height: 167px;
                width: 100%!important;"></a>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                <h2><b>{{$course->name}}</b></h2>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12">
                <b>{{$course->description}}</b>
            </div>
        </div>
    </div>
        @elseif($course->PrevCourseCompleted(Auth()->user()))
       {{ $course->id }}
       @endif

       @endforeach

    </div>
</div>

@endsection
