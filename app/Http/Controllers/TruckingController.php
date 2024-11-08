<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use App\Models\Akses;
use App\Models\Jenis;
use App\Models\Sektor;
use App\Models\DetailTrucking;
use App\Models\Trucking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TruckingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trucking.index', ["trucking" => Trucking::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trucking.create', [
            'truckingBaru' => Trucking::max('id'),
            'kota' => Kota::all(),
            'sektor' => Sektor::all(),
            'sektor2' => Sektor::all(),
            'jenis' => Jenis::all(),
            'jenis2' => Jenis::all(),
            'trucking' => Trucking::with('user','kota:id,namakota')->get(),
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
        $cekNama = Trucking::where('trucking.namatrucking',$request->namatrucking)->first();
        $akses = Akses::where('namaakses', 'trucking')->first();

        if($cekNama == null){
            $validatedData = $request->validate([
                'namatrucking' => 'required|max:50',
                'alamattrucking' => 'required|max:100',
                'kotatrucking' => 'required',
                'telptrucking' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
                'email' => 'required|email|unique:users,email',
                'toptrucking' => 'required|between:1,2|gte:7|lte:30',
                'jmlarmada20' => 'required|digits_between:1,2|gte:1|lte:100',
                'jmlarmada40' => 'required|digits_between:1,2|gte:1|lte:100',
                'tahunaktif' => 'required',
            ],[
                'kotatrucking.required' => 'silahkan pilih kotanya',
                'unique' => 'email sudah terdaftar, gunakan email lain',
                'required' => 'field tidak boleh kosong',
                'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
                'max' => 'data tidak boleh lebih dari :max karakter',
                'min' => 'data tidak boleh kurang dari :min karakter',
                'digits_between' => 'nilai angka minimal :min digit, maksimal :max digit',
                'gte' => 'nilai angka harus lebih dari atau sama dengan :value',
                'lte' => 'nilai angka harus kurang dari atau sama dengan :value',
            ]);
            User::create([
                'nama' => $validatedData['namatrucking'],
                'email' => $validatedData['email'],
                'password' => Hash::make("TRUCKING"),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userId = User::where('nama',$validatedData['namatrucking'])->first()->id;
            Trucking::create([
                'fk_iduser' => $userId,
                'fk_idakses' => $akses->id,
                'fk_idkota' => $validatedData['kotatrucking'],
                'namatrucking' => $validatedData['namatrucking'],
                'alamattrucking' => $validatedData['alamattrucking'],
                'telptrucking' => $validatedData['telptrucking'],
                'toptrucking' => $validatedData['toptrucking'],
                'jmlarmada20' => $validatedData['jmlarmada20'],
                'jmlarmada40' => $validatedData['jmlarmada40'],
                'tahunaktif' => $validatedData['tahunaktif'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $getId = Trucking::where('trucking.namatrucking',$request->namatrucking)->first()->id;
            $idsektor = $request->idsektor;
            $idjenis = $request->idjenis;
            $hargatruck = $request->harga;
            for($count = 0; $count<count($hargatruck); $count++){
                $hasil = array(
                        'fk_idtrucking' => $getId,
                        'fk_idsektor' => $idsektor[$count],
                        'fk_idjenis' => $idjenis[$count],
                        'harga' => $hargatruck[$count],
                        'created_at' => now(),
                        'updated_at' => now(),
                );
                $insert_data[] = $hasil;
            };
            DetailTrucking::insert($insert_data);
        }
        else{
            $getId = Trucking::where('trucking.namatrucking',$request->namatrucking)->first()->id;
            $idsektor = $request->idsektor;
            $idjenis = $request->idjenis;
            $hargatruck = $request->harga;
            for($count = 0; $count<count($hargatruck); $count++){
                $hasil = array(
                        'fk_idtrucking' => $getId,
                        'fk_idsektor' => $idsektor[$count],
                        'fk_idjenis' => $idjenis[$count],
                        'harga' => $hargatruck[$count],
                        'created_at' => now(),
                        'updated_at' => now(),
                );
                $insert_data[] = $hasil;
            };
            DetailTrucking::insert($insert_data);
        }
        
        return redirect('/trucking')->with('input','Data Berhasil Diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('trucking.detail', [
            "trucking" => Trucking::find(base64_decode($id)),
            "detail" => DetailTrucking::with('sektor','jenis')->where('detailtrucking.fk_idtrucking',base64_decode($id))->get(),
            "countdetail" => DetailTrucking::where('detailtrucking.fk_idtrucking',base64_decode($id))->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trucking = Trucking::find($id);
        $kota = Kota::all();
        return view('trucking/edit', compact('trucking','kota'));
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
        $request->validate([
            'namatrucking' => 'required',
            'kotatrucking' => 'required',
            'alamattrucking' => 'required|max:100',
            'telptrucking' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'toptrucking' => 'required|between:1,2|gte:7|lte:30',
            'jmlarmada20' => 'required|digits_between:1,2|gte:0',
            'jmlarmada40' => 'required|digits_between:1,2|gte:0',
        ],[
            'kotatrucking.required' => 'silahkan pilih kotanya',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'min' => 'data tidak boleh kurang dari :min karakter',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'digits_between' => 'nilai angka minimal :min digit, maksimal :max digit',
            'between' => 'nilai angka minimal :min digit, maksimal :max digit',
            'gte' => 'nilai angka harus lebih dari atau sama dengan :value',
            'lte' => 'nilai angka harus kurang dari atau sama dengan :value',
        ]);
        
        $kota = Kota::find($request->kotatrucking);
        $trucking = Trucking::find($id);
        $trucking->update($request->all());
        $trucking->kota()->associate($kota)->save();
        return redirect('/trucking')->with('update','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailTrucking::where('detailtrucking.idtrucking', $id)->delete();
        Trucking::destroy($id);
        return redirect('/trucking')->with('hapus','Data Berhasil Dihapus');
    }
}
