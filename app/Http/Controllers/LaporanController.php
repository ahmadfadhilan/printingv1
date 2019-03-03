<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Printing;
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
        $hutang = DB::table('hutang')
        ->join('printing', 'printing.id', '=', 'hutang.id_print')
        ->join('asisten', 'asisten.id', '=', 'printing.id_asisten')
        ->get();

        $printing = Printing::all();

        $db_asisten = DB::table('asisten')
        ->join('users', 'users.nim', '=', 'asisten.nim')
        ->select('users.nama','asisten.*')
        ->get();
         
        $asisten = $db_asisten->pluck('nama','id_asisten');
        // dd($asisnet);

        return view('laporan', ['transaksi_1'=> $printing,'transaksi_2'=> $printing,'transaksi_3'=> $printing,'transaksi_4'=> $printing], compact('asisten'));
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
