<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'Profil_Image' => 'image|mimes:jpeg,jpg,png,svg|max:2048'
        ]);
        
        $profile = [
            'name' => $request->name,
            'email' => $request->email,
            'posisi' => $request->posisi,
        ];
        
        if ($image = $request->file('Profil_Image')) {
            $destinationPath = 'images/user';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profile['Profil_Image'] = $profileImage;
        }
        
        auth()->user()->update($profile);
        

        return redirect()->route('profile')->with('success', 'Profile berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
