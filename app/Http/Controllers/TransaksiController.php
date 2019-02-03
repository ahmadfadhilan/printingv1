<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
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

        $db_asisten = DB::table('asistens')
        ->join('mahasiswas', 'mahasiswas.nim', '=', 'asistens.nim')
        ->select('mahasiswas.nama','asistens.*')
        ->get(); 

        $asisten = $db_asisten->pluck('nama','id_asisten');
        $nim = $db_asisten->pluck('nim');
        
        
        // dd($hutang);
        return view('transaksi', ['transaksi'=> $transaksi, 'hutang' => $hutang], compact('hutang','asisten','nim'));
        
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
           $request->validate([

             'kustomer'=> 'required',
             'total'=> 'required',
             'id_asisten'=> 'required'
                     
           ]);
           
           $db_mhs = DB::table('mahasiswas')->get();
           $cari = $db_mhs->where('nim', $request->input('kustomer'))->first();
        //    dd($cari);
           $transaksi = new Transaksi();
           
           if($cari == true){
                $transaksi->kustomer = $cari->nama;   
            }
            else{
                $transaksi->kustomer = $request->input('kustomer');
            }
            $transaksi->total = $request->input('total');
            $transaksi->id_asisten = $request->input('id_asisten');
            $transaksi->pembayaran = $request->input('pembayaran');
            $transaksi->hitam = $request->input('hitam');
            $transaksi->warna = $request->input('warna');
            $transaksi->kertas = $request->input('kertas');
            $transaksi->save(); // supaya dapat berapa transaksi id

            if ($request->input('selisih') < 0) {

                $hutang = new Hutang();
                $hutang->jumlah_hutang = -$request->get('selisih');
                $hutang->id_trans = $transaksi->id;
                $hutang->save();
            }

            return redirect()->back();
            
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
    public function update(Request $request, $id)
    {
        $hutang = DB::table('hutangs')
        ->join('transaksis', 'transaksis.id_trans', '=', 'hutangs.id_trans')
        ->join('asistens', 'transaksis.id_asisten', '=', 'asistens.id_asisten')
        ->where('id_hutang', $id);
        // // $test = $hutang->pluck('hitam','warna','kertas');
        // dd($hutang->pluck('kustomer')->first());
        
        $transaksi = new Transaksi();

            $transaksi->kustomer = $hutang->pluck('kustomer')->first();    
            $transaksi->total = $request->input('d_total');
            $transaksi->id_asisten = $request->input('d_asisten');
            $transaksi->pembayaran = $request->input('d_pay');
            $transaksi->hitam = $hutang->pluck('hitam')->first();
            $transaksi->warna = $hutang->pluck('warna')->first();
            $transaksi->kertas = $hutang->pluck('kertas')->first(); 
            $transaksi->save();

        if ($request->input('sisa') > 0) {
        $hutang->update([
            'jumlah_hutang' => $request->input('sisa')]);
            return redirect()->route('transaksi.index');
        }
        else {
            $hutang->delete();
            // dd($hutang);
            return redirect()->route('transaksi.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hutang $hutang, $id)
    {
        
    }
}
