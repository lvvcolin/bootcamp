@extends('layouts.app')

@section('content')
<!--Hero-->
<div class="pt-18">


    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">

        <!--Left Col-->
        <div class="w-full -mt-32 md:w-2/5 text-left">
                <img class="w-full md:w-4/5 z-50" src="https://as2.ftcdn.net/v2/jpg/02/67/68/99/1000_F_267689946_Zdtt4lNoHHLRAf5hoWiemKngjcfLPCwo.jpg"/>

            <div class="grid grid-rows-3 w-4/5">
                <a href="" class="text-md p-2 mt-2 bg-yellow-300 text-white rounded font-bold">Mijn Profiel</a>

                <a href="{{ route('profile_edit', [$user]) }}"
                    class="text-md text-gray-600 p-2 mt-2 bg-yellow-200 rounded font-semibold hover:bg-yellow-100 hover:text-gray-400">Update Informatie</a>

                <a href="#"
                    class="text-md text-gray-600 p-2 mt-2 bg-yellow-200 rounded font-semibold hover:bg-yellow-100 hover:text-gray-400">Another Something</a>

            </div>
        </div>

    <!--Right Col-->
        <div class="flex flex-col w-full -ml-8 mt-6 md:w-3/5 justify-center tracking-wider md:text-right">


            <form action="#" class="bg-white py-6 px-6 w-full">
                <p class="uppercase font-bold w-full text-center">Basis informatie</p>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Naam</label>
                    <input type="text" value="{{ $user->name}}" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Gebruikersnaam</label>
                    <input type="text" value="{{ $user->username}}" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Email</label>
                    <input type="text" value="{{ $user->email}}" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Aangemeld sinds</label>
                    <input type="text" value="{{date('d-m-Y', strtotime($user->created_at)) }}" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <!--Repository-->
                <p class="uppercase pt-4 font-bold w-full text-center">Repository links</p>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Gitlab</label>
                    <input type="text" value="https://gitlab.com/" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Github</label>
                    <input type="text" value="https://github.com/" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>

                <div class="form-item text-left p-2 mt-2">
                    <label class="text-lg">Azure Devops</label>
                    <input type="text" value="https://visualstudio.microsoft.com/" class="w-full appearance-none text-black text-opacity-70 tracking-wider rounded shadow-sm py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
