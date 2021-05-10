@extends('layouts.app')

@section('content')

<div class="w-10/12 mx-auto justify-center shadow relative mt-4 rounded-md my-24 overflow-hidden">

    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative">

        <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=3300&q=80"
            alt="" class="bg w-full h-full object-cover object-center absolute z-0">

        <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">

            <img src="{{$user->avatar}}" class="h-24 w-24 object-cover rounded-full">

            <h1 class="text-2xl font-normal">{{$user->name}}</h1>

            <h4 class="text-sm font-light mt-2">Aangemeld sinds {{date('d-m-Y', strtotime($user->created_at)) }}</h4>

        </div>

    </div>

    <div class="grid grid-cols-12 bg-white ">

        <div
            class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">

            <a href="" class="text-sm p-2 bg-blue-500 text-white text-center rounded font-bold">Mijn Profiel</a>

            <a href="{{ route('profile_edit', [$user]) }}"
                class="text-sm p-2 bg-blue-300 text-center rounded font-semibold hover:bg-blue-200 hover:text-gray-800">Update
                Informatie</a>

            <a href="#"
                class="text-sm p-2 bg-blue-300 text-center  rounded font-semibold hover:bg-blue-200 hover:text-gray-800">Another
                Something</a>

        </div>

        <div
            class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">

            <div class="px-4 pt-4">

                <form action="#" class="flex flex-col space-y-8">

                    <div>

                        <h3 class="text-xl font-semibold">Basis informatie</h3>

                        <hr>

                    </div>

                    <div class="form-item">

                        <label class="text-lg ">Naam</label>

                        <input type="text" value="{{ $user->name}}"
                            class="w-full appearance-none text-black text-opacity-70 rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200"
                            disabled>

                    </div>

                    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                        <div class="form-item w-full">

                            <label class="text-lg ">Gebruikersnaam</label>

                            <input type="text" value="{{ $user->username}}"
                                class="w-full appearance-none text-black text-opacity-70 rounded shadow-sm py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>

                        </div>

                        <div class="form-item w-full">

                            <label class="text-lg ">Email</label>

                            <input type="text" value="{{ $user->email}}"
                                class="w-full appearance-none text-black text-opacity-70 rounded shadow-sm py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                disabled>

                        </div>

                    </div>

                    <div>

                        <h3 class="text-xl font-semibold">Mijn repository channels</h3>

                        <hr>

                    </div>

                    <div class="form-item">

                        <label class="text-lg ">Azure</label>

                        <input type="text" value="https://visualstudio.microsoft.com/"
                            class="w-full appearance-none text-black text-opacity-70 rounded shadow-sm py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                            disabled>

                    </div>

                    <div class="form-item">

                        <label class="text-lg ">Gitlab</label>

                        <input type="text" value="https://gitlab.com/"
                            class="w-full appearance-none text-black text-opacity-70 rounded shadow-sm py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                            disabled>

                    </div>

                    <div class="form-item">

                        <label class="text-lg">Github</label>

                        <input type="text" value="https://github.com/"
                            class="w-full appearance-none text-black text-opacity-70 rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  "
                            disabled>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
