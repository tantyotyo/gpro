<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kapal;
use App\Models\Rute;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal.index', [
            "jadwal" => Jadwal::with('kapal','rute')->get(),
            "kapal" => Kapal::all(),
            "rute" => Rute::all(),
        ]);
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
        
        $validatedData = $request->validate([
            'idkapal' => 'required',
            'idrute' => 'required',
            'voyage' => 'required|min:1|max:5',
            'etd' => 'required',
            
        ],[
            'idkapal.required' => 'silahkan pilih kapalnya',
            'idrute.required' => 'silahkan pilih rutenya',
            'required' => 'field tidak boleh kosong',
            // 'regex' => 'harus diawali dengan angka, boleh diakhiri dengan huruf',
            'min' => 'data tidak boleh kurang dari :mix karakter',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);

        $cekJadwal = Jadwal::where('id',$request->id)->where('voyage',$request->voyage)->first();
        if($cekJadwal == null){
            Jadwal::create([
                'fk_idkapal' => $validatedData['idkapal'],
                'fk_idrute' => $validatedData['idrute'],
                'voyage' => $validatedData['voyage'],
                'etd' => $validatedData['etd'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        else{
            return redirect('/jadwal')->with(['error' => 'Maaf! Data jadwal sudah pernah diinput!!',])->withInput();
        }
        
        return redirect('/jadwal')->with('input','Data berhasil ditambah');
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
        // dd(Jadwal::find(base64_decode($id)));
        return view('jadwal.edit', [
            "jadwal" => Jadwal::with('kapal','rute')->where('id',base64_decode($id))->first(),
            "kapal" => Kapal::all(),
            "rute" => Rute::all(),
        ]);
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
            'idkapal' => 'required',
            'idrute' => 'required',
            'voyage' => 'required|min:1|max:5',
            'etd' => 'required',
            
        ],[
            'idkapal.required' => 'silahkan pilih kapalnya',
            'idrute.required' => 'silahkan pilih rutenya',
            'required' => 'field tidak boleh kosong',
            // 'regex' => 'harus diawali dengan angka, boleh diakhiri dengan huruf',
            'min' => 'data tidak boleh kurang dari :mix karakter',
            'max' => 'data tidak boleh lebih dari :max karakter',
        ]);
        
        Jadwal::find(base64_decode($id))->update([
            'fk_idkapal' => $validatedData['idkapal'],
            'fk_idrute' => $validatedData['idrute'],
            'voyage' => $validatedData['voyage'],
            'etd' => $validatedData['etd'],
            'updated_at' => now(),
        ]);
        return redirect('/jadwal')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect('/jadwal')->with('hapus','Data berhasil dihapus');
    }
}
