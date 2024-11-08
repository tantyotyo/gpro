<?php

namespace App\Http\Controllers;

use App\Models\Pelayaran;
use App\Models\Kota;
use App\Models\Jenis;
use App\Models\Rute;
use App\Models\DetailPelayaran;
use Illuminate\Http\Request;

class PelayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelayaran.index', ["pelayaran" => Pelayaran::with('kota')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelayaran.create', [
            'pelayaranBaru' => Pelayaran::max('id'),
            'kota' => Kota::all(),
            'rute' => Rute::all(),
            'rute2' => Rute::all(),
            'jenis' => Jenis::all(),
            'jenis2' => Jenis::all(),
            'pelayaran' => Pelayaran::with('kota')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cekNama = Pelayaran::where('pelayaran.namapelayaran',$request->namapelayaran)->first();
        $validatedData = $request->validate([
            'namapelayaran' => 'required|max:50',
            'alamatpelayaran' => 'required|max:100',
            'kotapelayaran' => 'required',
            'telppelayaran' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
        ],[
            'kotapelayaran.required' => 'silahkan pilih kotanya',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
        ]);

        if($cekNama == null){
            Pelayaran::create([
                'fk_idkota' => $validatedData['kotapelayaran'],
                'namapelayaran' => $validatedData['namapelayaran'],
                'alamatpelayaran' => $validatedData['alamatpelayaran'],
                'telppelayaran' => $validatedData['telppelayaran'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $getId = Pelayaran::select('pelayaran.id')->where('pelayaran.namapelayaran',$request->namapelayaran)->first()->id;
            $idrute = $request->idrute;
            $idjenis = $request->idjenis;
            $hargapelayaran = $request->harga;
            for($count = 0; $count<count($hargapelayaran); $count++){
                $hasil = array(
                        'fk_idpelayaran' => $getId,
                        'fk_idrute' => $idrute[$count],
                        'fk_idjenis' => $idjenis[$count],
                        'harga' => $hargapelayaran[$count],
                        'created_at' => now(),
                        'updated_at' => now(),
                );
                $insert_data[] = $hasil;
            };
            DetailPelayaran::insert($insert_data);
        }
        else{
            $getId = Pelayaran::select('pelayaran.id')->where('pelayaran.namapelayaran',$request->namapelayaran)->first()->id;
            $idrute = $request->idrute;
            $idjenis = $request->idjenis;
            $hargapelayaran = $request->harga;
            for($count = 0; $count<count($hargapelayaran); $count++){
                $hasil = array(
                        'fk_idpelayaran' => $getId,
                        'fk_idrute' => $idrute[$count],
                        'fk_idjenis' => $idjenis[$count],
                        'harga' => $hargapelayaran[$count],
                        'created_at' => now(),
                        'updated_at' => now(),
                );
                $insert_data[] = $hasil;
            };
            DetailPelayaran::insert($insert_data);
        }
        return redirect('/pelayaran')->with('input','Data Berhasil Diinput');
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
        $pelayaran = Pelayaran::find($id);
        $kota = Kota::all();
        return view('pelayaran.edit', compact('pelayaran','kota'));
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
        $validatedData = $request->validate([
            'namapelayaran' => 'required|max:50',
            'kotapelayaran' => 'required',
            'alamatpelayaran' => 'required|max:100',
            'telppelayaran' => 'required|regex:/^([0-9\+\(])([0-9\s\-\)])*$/|min:10|max:14',
        ],
        $messages = array(
            'kotapelayaran.required' => 'silahkan pilih kotanya dulu',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'min' => 'data tidak boleh kurang dari :min karakter',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ));
        $kota = Kota::find($request->kotapelayaran);
        $pelayaran = Pelayaran::find($id);
        $pelayaran->update($request->all());
        $pelayaran->kota()->associate($kota)->save();
        return redirect('/pelayaran')->with('update','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailPelayaran::where('detailpelayaran.fk_idpelayaran', $id)->delete();
        Pelayaran::destroy($id);
        return redirect('/pelayaran')->with('delete','Data Berhasil Dihapus');
    }
}
