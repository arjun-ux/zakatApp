<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DetailPenampungController extends Controller
{
    //index
    public function index($id){
        $detailPenampung = DB::table('penampungs as p')
                                ->join('detail_penampungs as dp', 'dp.penampung_id', '=', 'p.id')
                                ->join('zakats as zk', 'zk.id', '=', 'dp.zakat_id')
                                ->where('p.id', $id)
                                ->get();

        // dd($detailPenampung);
        return view('detail_penampung.index', ['data'=>$detailPenampung]);
    }
}
