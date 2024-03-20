<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ZakatController extends Controller
{
    // index
    public function index(){
        if (Auth::user()->role == 'admin') {
            $userAll = User::all();
            $zakatAll = Zakat::all();
            return view('zakat.index', compact('userAll', 'zakatAll'));
        }else {
            $user = Auth::user();
            $zakat = Zakat::where('user_id', Auth::user()->id)->get();
            // dd($zakat, $user);
            return view('zakat.index', compact('user','zakat'));
        }
    }
    // store
    public function store(Request $request){
        $request->validate([
            //
        ]);
        // dd($request);
        try {
            if (Auth::user()->role == 'admin') {
                Zakat::create([
                    'user_id' => $request->user_id,
                    'pemberi_zakat' => $request->pemberi_zakat,
                    'lokasi' => $request->lokasi,
                ]);
                return redirect()->back()->with('success', 'Data Berhasil Disimpan');
            }else {
                $user = Auth::user()->id;
                Zakat::create([
                    'user_id' => $user,
                    'pemberi_zakat' => $request->pemberi_zakat,
                    'lokasi' => $request->lokasi,
                ]);
                return redirect()->back()->with('success', 'Data Berhasil Disimpan');
            }
        } catch (\Throwable $th) {
            throw $th;
            Log::error();
        }
    }
    // edit
    public function edit($id){
        $zakat = Zakat::with('User')->where('id', $id)->first();
        // dd($zakat);
        return view('zakat.edit', [
            'zakat' => $zakat,
        ]);
    }
    //  update
    public function update(Request $request, $id){
        $request->validate([
            'jumlah'=>'required',
        ]);
        Zakat::where('id', $id)->update([
            'jumlah' => $request->jumlah,
            'status' => 'Di Ambil',
        ]);
        return redirect()->route('zakat.index')->with('success', 'Data telah di update');
    }
    // delete
    public function delete($id){
        $data = Zakat::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
