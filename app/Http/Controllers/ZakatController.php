<?php

namespace App\Http\Controllers;

use App\Models\DetailPenampung;
use App\Models\Penampung;
use App\Models\User;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            return view('zakat.index', compact('user','zakat'));
        }
    }
    // store
    public function store(Request $request){
        $request->validate([
            //
        ]);
        try {
            if (Auth::user()->role == 'admin') {
                Zakat::create([
                    'user_id' => $request->user_id,
                    'pemberi_zakat' => $request->pemberi_zakat,
                    'no_hp' => $request->no_hp,
                    'lokasi' => $request->lokasi,
                ]);
                return redirect()->back()->with('success', 'Data Berhasil Disimpan');
            }else {
                $user = Auth::user()->id;
                Zakat::create([
                    'user_id' => $user,
                    'pemberi_zakat' => $request->pemberi_zakat,
                    'no_hp' => $request->no_hp,
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
    // parsing ke penampungan
    public function goPenampung($id){
        if (Auth::user()->role == 'admin') {
            return 'Kamu admin';
        }else {
            $user = Auth::user();
            $penampung = DB::table('penampungs as pn')
                            ->join('users as us', 'us.penampung_id', '=', 'pn.id')
                            ->join('zakats as zk', 'zk.user_id', '=', 'us.id')
                            ->where('zk.id', $id)
                            ->first();
            $detail_penampung = DetailPenampung::where('zakat_id', $penampung->id)->first();
            if ($detail_penampung) {
                $detail_penampung->update([
                    'penampung_id' => $penampung->penampung_id,
                    'zakat_id' => $penampung->id,
                ]);
            }else {
                DetailPenampung::create([
                    'penampung_id' => $penampung->penampung_id,
                    'zakat_id' => $penampung->id,
                ]);
            }
            Penampung::where('id', $penampung->penampung_id)->update([
                'total' => $penampung->total + $penampung->jumlah,
            ]);
            Zakat::where('id', $penampung->id)->update([
                'status' => 'Di Penampung',
            ]);
            return redirect()->back()->with('success', 'Berhasil Masuk Ke Penampungan!');
        }
    }
}
