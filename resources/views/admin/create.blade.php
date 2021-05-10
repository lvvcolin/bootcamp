@extends('layout')


@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New User</h1>
        <br>
        <form method="POST" action="/admin">
            @csrf

            <div class="field">
                <label class="label" for="title">Title</label>

                <div class="control">
                    <input type="text" class="input" name="title" id="title" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                
                <div class="control">
                    <input type="textarea" class="input" name="excerpt" id="excerpt" required>
                </div>
            </div>
            
            <div class="field">
                <label class="label" for="body">Body</label>
                
                <div class="control">
                    <input type="textarea" class="input" name="body" id="body" required>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>    
                </div>   
                
            </div>

          
        </form>
    </div>
</div>
@endsection