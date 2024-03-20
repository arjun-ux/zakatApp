<?php

namespace App\Http\Controllers;

use App\Models\Penampung;
use App\Models\User;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenampungController extends Controller
{
    // index
    public function index(){
        // dd($penampung);
        if (Auth::user()->role == 'admin') {
            $userAll = User::all();
            $zakatAll = Zakat::all();
            $penampung = Penampung::with(['User', 'Zakat'])->get();
            return view('penampung.index', compact('userAll', 'zakatAll', 'penampung'));
        }
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id )->first();
        $zakat = Zakat::where('user_id', $user_id)->first();
        $penampung = Penampung::with(['User', 'Zakat'])->get();
        return view('penampung.index', compact('user', 'zakat', 'penampung'));
    }
    // create
    public function store(Request $request){
        $request->validate([
            //
        ]);
        $zakat = Zakat::where('id', $request->zakat_id)->first();

        $data = new Penampung();
        $data->user_id = $request->user_id;
        $data->zakat_id = $request->zakat_id;
        $data->jumlah = $zakat->jumlah;
        $data->save();

        $zakat->update([
            'status' => 'Di Penampung',
        ]);
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
