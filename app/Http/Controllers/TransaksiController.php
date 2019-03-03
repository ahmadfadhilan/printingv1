<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Printing;
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

        $hutang = DB::table('hutang')
        ->join('printing', 'printing.id', '=', 'hutang.id_print')
        ->join('asisten', 'asisten.id', '=', 'printing.id_asisten')
        ->get();

        $printing = Printing::all();

        $db_asisten = DB::table('asisten')
        ->join('users', 'users.nim', '=', 'asisten.nim')
        ->select('users.nama','asisten.*')
        ->get(); 

        $asisten = $db_asisten->pluck('nama','id');
        $nim = $db_asisten->pluck('nim');
        
        // dd($hutang);
        return view('transaksi', ['printing'=> $printing, 'hutang' => $hutang], compact('hutang','asisten','nim'));
        
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
           
           $db_mhs = DB::table('users')->get();
           $cari = $db_mhs->where('nim', $request->input('kustomer'))->first();
           $printing = new Printing();
           
           if($cari == true){
                $printing->kustomer = $cari->nama;   
            }
            else{
                $printing->kustomer = $request->input('kustomer');
            }
            $printing->total = $request->input('total');
            $printing->id_asisten = $request->input('id_asisten');
            $printing->pembayaran = $request->input('pembayaran');
            $printing->hitam = $request->input('hitam');
            $printing->warna = $request->input('warna');
            $printing->kertas = $request->input('kertas');
            $printing->save(); // supaya dapat berapa transaksi id

            if ($request->input('selisih') < 0) {

                $hutang = new Hutang();
                $hutang->jumlah_hutang = -$request->get('selisih');
                $hutang->id_print = $printing->id;
                $hutang->save();
            }

            return redirect()->back();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function show(Printing $printing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function edit(Printing $printing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hutang = Hutang::where('id', $id)->first();
        $printing = Printing::where('id' ,$hutang->id_print)->first();

        $printing->pembayaran = $printing->pembayaran + $request->input('d_pay');
        $printing->id_asisten = $request->input('d_asisten');
        $printing->update();

        if ($request->input('sisa') > 0) {
            $hutang->jumlah_hutang = $request->input('sisa');
            $hutang->update();
            return redirect()->back();
        }
        else {
            $hutang->delete();
            return redirect()->back();
        }
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $printing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hutang $hutang, $id)
    {
        
    }

}
