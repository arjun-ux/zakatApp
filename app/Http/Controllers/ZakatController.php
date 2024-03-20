<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ZakatController extends Controller
{
    // index
    public function index(){
        $user = User::all();
        $zakat = Zakat::all();
        return view('zakat.index', compact('user', 'zakat'));
    }
    // store
    public function store(Request $request){
        $request->validate([
            //
        ]);
        // dd($request);
        try {
            Zakat::create([
                'user_id' => $request->user_id,
                'pemberi_zakat' => $request->pemberi_zakat,
                'lokasi' => $request->lokasi,
                'jumlah' => $request->jumlah,
            ]);
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            throw $th;
            Log::error();
        }
    }
    // edit
    public function edit($id){
        $zakat = Zakat::where('id', $id)->first();
        return view('zakat.edit', [
            'zakat' => $zakat,
        ]);
    }
    //  update

    // delete
    public function delete($id){
        $data = Zakat::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
