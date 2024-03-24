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
        $penampung = Penampung::all();
        return view('penampung.index', compact('penampung'));
    }
    // create
    public function store(Request $request){
        $request->validate([
            //
        ]);
        if ($request) {
            Penampung::create([
                'tempat_penampung' => $request->tempat_penampung,
                'lokasi_penampung' => $request->lokasi_penampung,
            ]);
            return redirect()->back()->with('suksess', 'Berhasil Menambahkan Data');
        }
        return back()->with('error', 'Gagal Input Penampungan');
    }
    // edit
    public function edit($id){
        $penampung = Penampung::where('id', $id)->first();
        return view('penampung.edit', compact('penampung'));
    }
    // update
    public function update(Request $request, $id){
        $request->validate([
            //
        ]);
        if ($request) {
            $data = Penampung::where('id', $id)->first();
            $data->update([
                'tempat_penampung' => $request->tempat_penampung,
                'lokasi_penampung' => $request->lokasi_penampung,
            ]);
            return redirect()->route('penampung.index')->with('success', 'Berhasil Update Data');
        }
        return back()->with('error', 'Gagal Update Penampungan');
    }
    // delete
    public function delete($id){
        $data = Penampung::find($id);
        $data->delete();
        return back()->with('success', 'Berhasil Hapus Data');
    }
}
