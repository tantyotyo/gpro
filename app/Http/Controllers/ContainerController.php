<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Jenis;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('container.index', [
            "container" => Container::with(['jenis','jadwal'])->get(),
            "jenis" => Jenis::all(),
            "jadwal" => Jadwal::all(),
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
            'nocontainer' => 'required|unique:container|regex:/^([A-Z\])([0-9\s\-\.])*$/|min:11|max:13',
            'idjenis' => 'required',
            'idjadwal' => 'required',
            'nosegelpelayaran' => 'required|max:15',
            'nosegelglobal' => 'required|regex:/^([A\])([0-9\s\-\.\)])*$/|max:15',
        ],[
            'idjenis.required' => 'silahkan pilih jenis containernya',
            'required' => 'field tidak boleh kosong',
            'unique' => 'no container sudah terdaftar, gunakan no container lain',
            'nocontainer.regex' => 'harus terdiri 4 huruf prefix, dan diikutin angka dengan (spasi, -, atau .)',
            'nosegelglobal.regex' => 'diawali dengan huruf A, dan diikutin angka, karakter (spasi, -, atau .)',
            'min' => 'data tidak boleh kurang dari :min',
            'max' => 'data tidak boleh lebih dari :max',
        ]);

        Container::create([
            'id' => $validatedData['nocontainer'],
            'idjenis' => $validatedData['idjenis'],
            'idjadwal' => $validatedData['idjadwal'],
            'qty' => 1,
            'nosegelpelayaran' => $validatedData['nosegelpelayaran'],
            'nosegelglobal' => $validatedData['nosegelglobal'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/container')->with('input','Data berhasil ditambah');
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
        return view('container.edit', [
            "container" => Container::find(base64_decode($id)),
            "jenis" => Jenis::all(),
            "jadwal" => jadwal::with(['kapal'])->get(),
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
        $container = Container::find(base64_decode($id));

        $request->validate([
            'nocontainer' => 'required|regex:/^([A-Z\])([0-9\s\-\.])*$/|min:11|max:13',
            'idjenis' => 'required',
            'nosegelpel' => 'required|max:15',
            'nosegelgll' => 'required|regex:/^([A\])([0-9\s\-\.\)])*$/|max:15',
        ],
        $messages = array(
            'idjenis.required' => 'silahkan pilih jenis containernya',
            'required' => 'field tidak boleh kosong',
            'unique' => 'no container sudah terdaftar, gunakan no container lain',
            'nocontainer.regex' => 'harus terdiri 4 huruf prefix, dan diikutin angka dengan (spasi, -, atau .)',
            'nosegelgll.regex' => 'diawali dengan huruf A, dan diikutin angka, karakter (spasi, -, atau .)',
            'min' => 'data tidak boleh kurang dari :min',
            'max' => 'data tidak boleh lebih dari :max',
        ));
        
        $container->update($request->all());
        return redirect('/container')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Container::destroy($id);
        return redirect('/container')->with('hapus','Data berhasil dihapus');
    }
}
