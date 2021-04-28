@extends('layouts.app')

@section('content')
<div class="card" style="width: 36rem; ">

<table style="width:100%;">
  <tr>
    <th>name</th>
    <th>role</th>
    <th>controls</th>
  </tr>
  @foreach($users as $user)
  
  <tr>
    <td>{{$user->name}}</td>
    <td>{{$user->role}}</td>
    <td><button type="button" class="btn btn-primary" onclick="window.location.href = '{{route('users.edit', [$user->id])}}'">edit</button></td>
    <!-- <td>activity</td> -->
  </tr>
  @endforeach
</table>
</div>
@endsection
