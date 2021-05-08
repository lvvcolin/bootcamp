@extends('layouts.app')
@section('content')


       
    
<div class="flex" style="font-family: Arial;" x-data="{ open: true }">
    <div class="sidebar h-screen" style="width: 260px;" x-show="open">
        <div>
            <div class="text-purple-200 bg-purple-700 h-14 mx-auto block px-4 py-5">
                WELCOME, ADMIN
            </div>
            <div class="h-screen bg-purple-700">
                <div class="" style="font-size: 14px;">
                    <a href=""
                        class="h-12 px-4 py-3 text-purple-800 tracking-wider block bg-white font-medium border-b-2 border-purple-800 hover:text-purple-800 hover:bg-white">Dashboard</a>
                    <a href="{{ route('admin_create', [$users]) }}"
                        class="h-12 px-4 py-3 text-white tracking-wider block bg-purple-600 font-thin border-b-2 border-purple-800 hover:text-purple-800 hover:bg-white">Create Account</a>
                    <a href=""
                        class="h-12 px-4 py-3 text-white tracking-wider block bg-purple-600 font-thin border-b-2 border-purple-800 hover:text-purple-800 hover:bg-white">...</a>
                    <a href=""
                        class="h-12 px-4 py-3 text-white tracking-wider block bg-purple-600 font-thin border-b-2 border-purple-800 hover:text-purple-800 hover:bg-white">...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full z-10">
        <div class="col-md-4 flex-right" id="search">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </div>
        <div class="body">
            <div class="p-8" style="background-color: #E4E5E6;">
                <div class="main bg-white border-2 border-gray-300 rounded">
                    <div class="rounded-t border-b-2 border-gray-300" style="background-color: #F0F3F5;">
                        <h1 class="p-4">Headings</h1>
                    </div>
                    <div class="p-4">
                       
                        <table class="table table-striped table-sm table-hover shadow mt-4">
                            <thead>
                                <tr>
                                    <th style="padding-left: 20px;" scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">User type</th>
                                    <th scope="col">Member Since</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($users as $user)
                                <tr>
                                    <th style="padding-left: 20px;" scope="row">{{ $user->name }}</th>
                                    <th style="padding-left: 20px;" scope="row">{{ $user->username }}</th>
                                    <th style="padding-left: 20px;" scope="row">{{ $user->getRoleName() }}</th>
                                    <th scope="row">{{ date('d/m/Y', strtotime($user->created_at)) }}</th>
                                    <td>
                                        <a title="Show profile" id="edit" href="{{ route('profile', $user->username) }}">
                                            <ion-icon name="open-outline"></ion-icon>
                                        </a>
                                        <button title="Remove" id="remove" type="submit" onclick="return confirm('Are you sure you want to delete this?')" data-toggle="confirmation" style="	background: none; border: none; padding: 0; outline: inherit;">
                                            <ion-icon name="close-outline" ></ion-icon>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                
                                {{-- The links method renders the links to the rest of the pages in the result set. --}}
                                {{ $users->links() }}
                            </tbody>
                        </table>
                     </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@endsection




