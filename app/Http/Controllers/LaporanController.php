<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Transaksi;
use App\Hutang;
use App\Asisten;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hutang = DB::table('hutangs')
        ->join('transaksis', 'transaksis.id_trans', '=', 'hutangs.id_trans')
        ->join('asistens', 'transaksis.id_asisten', '=', 'asistens.id_asisten')
        ->get();

        $transaksi = Transaksi::all();

        $db_asisten = DB::table('asistens')
        ->join('mahasiswas', 'mahasiswas.nim', '=', 'asistens.nim')
        ->select('mahasiswas.nama','asistens.*')
        ->get();
         
        $asisten = $db_asisten->pluck('nama','id_asisten');
        return view('laporan', ['transaksi'=> $transaksi,'transaksi_2'=> $transaksi,'transaksi_3'=> $transaksi,'transaksi_4'=> $transaksi,], compact('hutang','asisten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
