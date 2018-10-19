<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Hutang;
use App\Asisten;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class TransaksiController extends Controller
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
        $asisten = Asisten::pluck('nama','id_asisten');
        return view('transaksi', ['transaksi'=> $transaksi], compact('hutang','asisten'));
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
        
        // $request->validate([

        //     'id_trans'=> 'required',
        //     'nama_printing'=> 'required',
        //     'total'=> 'required',
        //     'id_asisten'=> 'required'
                      
        //   ]);
    
            $transaksi = new Transaksi();
            
            $transaksi->nama_printing = $request->input('nama_printing');
            $transaksi->total = $request->input('total');
            $transaksi->id_asisten = $request->input('id_asisten');
            
           
            $transaksi->save();

            return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
