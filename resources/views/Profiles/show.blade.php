<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@extends('layouts.app')
<style>
    body {
        background-color: #EDF2F7;
    }
</style>
@section('content')
<div class="flex items-center justify-center">
    <div class="bg-white w-1/3 mt-10 rounded-lg">
        <div class="flex items-center justify-center pt-8 flex-col">

            <h1 class="text-gray-800 font-semibold text-xxl mt-5">
                {{$user->name}}
            </h1>
            <h1 class="text-gray-500 text-lg">
                {{$user->email}}
            </h1>
            <h1 class="text-gray-500 text-sm p-3 text-center">
                Joined: <br>{{$user->created_at}}
            </h1>

        </div>
    </div>
</div>
@endsection


