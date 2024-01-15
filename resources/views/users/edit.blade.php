@extends('layouts.app')
  
@section('title', 'Profile')
  
@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />
 
    <form method="POST" action="{{ route('user.update')}}" enctype="multipart/form-data" id="profile_setup_frm">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <img class="img-profile rounded-circle" src="" width="300px">
                <div class="row" id="res"></div>
                <div class="row mt-2">
  
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Posisi</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Posisi" value="{{ auth()->user()->posisi }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Image</label>
                        <input type="file" name="Profil_Image" class="form-control">
                        @error('Profil_Image')
                        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                 
                <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
         
    </div>   
            
        </form>
@endsection