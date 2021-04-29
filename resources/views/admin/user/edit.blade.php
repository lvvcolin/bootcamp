@extends('layouts.app')

@section('content')
<div class="card" style="width: 36rem;">
<div class="card-header">
<h3 class="mb-0">{{$user->name}} </h3>
<form action="{{route('user.update', [$user->id] )}}" method="post" id="updateUser">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" maxlength="255" required name="name"
                           value="{{$user->name}}">
                </div> 
                <p>current user role =  {{$user->role}}</p>
                        <div class="form-group">
                        <select name="role" id="role">
                        <label>Kies Rol</label>
                            <option value="1">Student</option>
                            <option value="2">Docent</option>
                            <option value="3">Administrator</option>
                        </select>
                        </div>
</form>
<div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="updateUser"> Submit </button>
        <form action="{{route('user.destroy', [$user->id] )}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">delete<i class="fas fa-trash"></i></button>
    </form>
    </div>
</div>         

@endsection
