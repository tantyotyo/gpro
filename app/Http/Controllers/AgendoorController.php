<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use App\Models\Akses;
use App\Models\Agendoor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgendoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agendoor.index', [
            "agendoor" => Agendoor::with('user','kota')->get(),
            "kota" => Kota::all(),
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
        $akses = Akses::where('namaakses', 'agendoor')->first();
        // dd($akses);
        $validatedData = $request->validate([
            'namaagen' => 'required|max:50',
            'alamatagen' => 'required|max:100',
            'kotaagen' => 'required',
            'telpagen' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'email' => 'required|email|unique:users,email',
        ],[
            'kotaagen.required' => 'silahkan pilih kotanya dulu',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
            'unique' => 'email sudah terdaftar, harap menggunakan email lain',
        ]);
        User::create([
            'nama' => $validatedData['namaagen'],
            'email' => $validatedData['email'],
            'password' => Hash::make('AGENDOOR'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $userId = User::where('nama',$validatedData['namaagen'])->first()->id;
        Agendoor::create([
            'fk_iduser' => $userId,
            'fk_idakses' => $akses->id,
            'fk_idkota' => $validatedData['kotaagen'],
            'namaagen' => $validatedData['namaagen'],
            'alamatagen' => $validatedData['alamatagen'],
            'telpagen' => $validatedData['telpagen'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/agendoor')->with('input', 'Data berhasil ditambah');
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
        return view('agendoor.edit', [
            'agendoor' => Agendoor::with('user')->where('fk_iduser',base64_decode($id))->first(),
            'kota' => Kota::all(),
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
        $agendoor = Agendoor::where('fk_iduser',base64_decode($id))->first();
        $user = User::find(base64_decode($id));
        $validatedData = $request->validate([
            'namaagen' => 'required|max:50',
            'alamatagen' => 'required|max:100',
            'kotaagendoor' => 'required',
            'email' => 'required|email',
            'telpagen' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
        ],[
            'kotaagendoor.required' => 'silahkan pilih kotanya dulu',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
        ]);

        $agendoor->update([
            'namaagen' => $validatedData['namaagen'],
            'fk_idkota' => $validatedData['kotaagendoor'],
            'alamatagen' => $validatedData['alamatagen'],
            'telpagen' => $validatedData['telpagen'],
        ]);
        $user->update([
            'email' => $validatedData['email'],
        ]);
        return redirect('/agendoor')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agendoor::where('fk_iduser',$id)->delete();
        User::destroy($id);
        return redirect('/agendoor')->with('delete', 'Data berhasil dihapus');
    }
}
