<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // index login
    public function index(){
        return view('auth.login');
    }
    // dologin
    public function doLogin(Request $request)
    {
        $creden = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($creden);
        if (Auth::attempt($creden)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'Login Gagal');
    }
    // logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    // CRUD USER

    //  user
    public function userIndex(){
        $users = User::all();
        return view('auth.user', compact('users'));
    }
    // doregistter
    public function doRegister(Request $request){
        $request->validate([
            //
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return back()-> with('sukses', 'Berhasil Menambahkan User');
    }
    // edit user
    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('auth.edit', compact('user'));
    }
    // update user
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('id', $id)->first();
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'Berhasil Update User');
    }
    // delete user
    public function delete($id){
        $user = User::where('id', $id)->first();
        if ($user->id == 1) {
            return back()->with('error', 'Admin Berkuasa Tidak Bisa Di Hapus');
        }
        $user->delete();
        return back()->with('success', 'Data Berhasil Terhapus');
    }
}
