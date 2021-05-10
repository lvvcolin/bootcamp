@extends('layouts.app')

@section('content')

<div class="container">

    <a href="{{ url()->previous() }}" class="bg-blue-400 text-white rounded py-2 px-4 mb-6 hover:bg-blue-500 float-right">Back</a>
    <br>

    <form method="POST" action="{{ route('profile_update', [$user])}}" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <div class="my-6">

            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                Name

            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
                value="{{ $user->name}}" required>

            @error('name')

            <p class="text-red-500 text-xs mt-2">{{ $message}}</p>

            @enderror

        </div>

        <div class="mb-6">

            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                Username

            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username"
                value="{{ $user->username}}" required>

            @error('username')

            <p class="text-red-500 text-xs mt-2">{{ $message}}</p>

            @enderror

        </div>

        <div class="mb-6">

            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                Avatar

            </label>

            <input class="border border-gray-400 p-2 w-full" type="file" accept=".jpg" max-width="1920" max-height="1080" name="avatar" id="avatar"
                value="{{ $user->avatar}}">

            @error('avatar')

            <p class="text-red-500 text-xs mt-2">{{ $message}}</p>

            @enderror

        </div>

        <div class="mb-6">

            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                E-mail

            </label>

            <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                value="{{ $user->email}}" required>

            @error('email')

            <p class="text-red-500 text-xs mt-2">{{ $message}}</p>

            @enderror

        </div>

        <div class="mb-6">

            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                password

            </label>

            <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                required>

            @error('password')

            <p class="text-red-500 text-xs mt-2">{{ $message}}</p>

            @enderror

        </div>

        <div class="mb-6">

            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                Password Confirmation

            </label>

            <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation"
                id="password_confirmation" required>

            @error('password_confirmation')

            <p class="text-red-500 text-xs mt-2">{{ $message}}</p>

            @enderror

        </div>

        <div class="mb-6">

            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">

                Submit

            </button>

        </div>

    </form>

</div>

@endsection
