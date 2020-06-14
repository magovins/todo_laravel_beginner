@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                {{--
                <div class="card-body">
                      
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        You are logged in!
                    
                    
                </div>
                --}}

                <div class="card-body">
                    <x-alert />
                    <h5>Add or change your avatar</h5>
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container d-flex input-group">
                            <div class="custom-file input-group-prepend col-md-6">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="input-group-append col-md-2">
                                <input type="submit" class="btn btn-outline-success" value="Upload">
                            </div>    
                        </div>                        
                    </form>
                    <h5 class="mt-4"><a href="{{ route('todo.index') }}" class="btn btn-outline-primary">Tasks</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection