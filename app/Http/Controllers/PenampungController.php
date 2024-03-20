<?php

namespace App\Http\Controllers;

use App\Models\Penampung;
use App\Models\User;
use Illuminate\Http\Request;

class PenampungController extends Controller
{
    // index
    public function index(){
        $user = User::all();
        $penampung = Penampung::with('User')->get();
        return view('penampung.index', compact('user', 'penampung'));
    }
    // create
    public function store(Request $request){
        $request->validate([
            //
        ]);
        $data = new Penampung();
        $data->user_id = $request->user_id;
        $data->nama = $request->nama;
        $data->lokasi = $request->lokasi;
        $data->save();
        return back()->with('suksess', 'Berhasil Menambahkan Data');
    }
    // edit
    public function edit($id){
        $user = User::all();
        $penampung = Penampung::with('User')->where('id', $id)->first();
        return view('penampung.edit', compact('penampung', 'user'));
    }
    // update
    public function update(Request $request, $id){
        $request->validate([
            //
        ]);
        $data = Penampung::where('id', $id)->first();
        $data->update([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
        ]);
        return redirect()->route('penampung.index')->with('success', 'Berhasil Update Data');
    }
    // delete
    public function delete($id){
        $data = Penampung::where('id', $id)->first();
        $data->delete();
        return back()->with('success', 'Berhasil Hapus Data');
    }
}
