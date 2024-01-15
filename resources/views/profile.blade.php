@extends('layouts.app')
  
@section('title', 'Profile')
  
@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />
    @if(session()->has('success'))
    <div class="text-green-600-mb-4">{{session()->get('success')}}</div>
    @endif
 
    <form method="POST" action="" enctype="multipart/form-data" id="profile_setup_frm">
    <div class="row">
        <div class="col-md-12 border-right">
        <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <img class="img-profile rounded-circle" src="{{ asset('images/user/' . auth()->user()->Profil_Image) }}" alt="Profile Image" width="300px">
                <div class="row" id="res"></div>
                <div class="row mt-2">
  
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" name="name" disabled class="form-control" placeholder="first name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Posisi</label>
                        <input type="text" name="posisi" disabled class="form-control" placeholder="Posisi" value="{{ auth()->user()->posisi }}">
                    </div>
                </div>
                <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
         
    </div>   
            
        </form>
@endsection