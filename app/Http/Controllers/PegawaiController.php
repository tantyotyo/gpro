<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Akses;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Pegawai::with(['user.akses:idakses,namaakses',])->get());
        return view('pegawai.index', [
            'pegawai' => Pegawai::with(['user','akses',])->get(),
            'akses' => Akses::whereNotIn('namaakses', ['customer','agendoor'])->get(),
            // 'akses' => Akses::all(),
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
            'namapegawai' => 'required|max:25',
            'alamatpegawai' => 'required|max:100',
            'aksespegawai' => 'required',
            'imgupload' => 'image|file|max:1024',
            'email' => 'required|email|unique:users,email',
            'telppegawai' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'jkpegawai' => 'required',
        ],[
            'aksespegawai.required' => 'silahkan pilih hak aksesnya',
            'required' => 'field tidak boleh kosong',
            'unique' => 'data email sudah terdaftar, gunakan email lain',
            'imgupload.file' => 'file yang diupload harus berupa gambar',
            'imgupload.max' => 'ukuran file tidak boleh lebih dari 1 MB',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
        ]);

        if($request->file('imgupload')){
            $extensi = $request->imgupload->extension();
            $imgname = $request->namapegawai.'_'.date('dmyHis');
            $request->imgupload->storeAs('image',$imgname.'.'.$extensi);
            User::create([
                'nama' => $validatedData['namapegawai'],
                'email' => $validatedData['email'],
                'image' => $imgname.'.'.$extensi,
                // 'username' => 'GLL'.strtoupper(explode(' ', trim($validatedData['namapegawai']))[0]),
                'password' => Hash::make('GLOBAL'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $userId = User::where('nama',$validatedData['namapegawai'])->first()->id;
    
            Pegawai::create([
                'fk_idakses' => $validatedData['aksespegawai'],
                'fk_iduser' => $userId,
                'alamatpegawai' => $validatedData['alamatpegawai'],
                'telppegawai' => $validatedData['telppegawai'],
                'jkpegawai' => $validatedData['jkpegawai'],
                'statpegawai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        else{
            User::create([
                'nama' => $validatedData['namapegawai'],
                'email' => $validatedData['email'],
                // 'username' => 'GLL'.strtoupper(explode(' ', trim($validatedData['namapegawai']))[0]),
                'password' => Hash::make('GLOBAL'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userId = User::where('nama',$validatedData['namapegawai'])->first()->id;
            Pegawai::create([
                'fk_idakses' => $validatedData['aksespegawai'],
                'fk_iduser' => $userId,
                'alamatpegawai' => $validatedData['alamatpegawai'],
                'telppegawai' =>$validatedData['telppegawai'],
                'jkpegawai' => $validatedData['jkpegawai'],
                'statpegawai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect('/pegawai')->with('input', 'Data berhasil ditambah');
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
        return view('pegawai.edit',[
            'pegawai' => Pegawai::with(['user','akses:id,namaakses',])->where('fk_iduser',base64_decode($id))->first(),
            'akses' => Akses::all(),
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
        $pegawai = Pegawai::where('fk_iduser',base64_decode($id));
        $user = User::find(base64_decode($id));
        $getCurPic = $user->image;
        $validatedData = $request->validate([
            'namapegawai' => 'required|max:25',
            'alamatpegawai' => 'required|max:100',
            'aksespegawai' => 'required',
            'imgupload' => 'image|file|max:1024',
            'email' => 'required|email',
            'telppegawai' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'jkpegawai' => 'required',
            'statpegawai' => 'required',
        ],[
            'aksespegawai.required' => 'silahkan pilih hak aksesnya',
            'required' => 'field tidak boleh kosong',
            'unique' => 'data email sudah terdaftar, gunakan email lain',
            'imgupload.file' => 'file yang diupload harus berupa gambar',
            'imgupload.max' => 'ukuran file tidak boleh lebih dari 1 MB',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
        ]);
        
        if($request->file('imgupload')){
            $extensi = $request->imgupload->extension();
            $imgname = $request->namapegawai.'_'.date('dmyHis');
            $request->imgupload->storeAs('image',$imgname.'.'.$extensi);
            $pegawai->update([
                'fk_idakses' => $validatedData['aksespegawai'],
                'alamatpegawai' => $validatedData['alamatpegawai'],
                'telppegawai' => $validatedData['telppegawai'],
                'jkpegawai' => $validatedData['jkpegawai'],
                'statpegawai' => $validatedData['statpegawai'],
                'updated_at' => now(),
            ]);
            $user->update([
                'nama' => $validatedData['namapegawai'],
                'email' => $validatedData['email'],
                'image' => $imgname.'.'.$extensi,
                'updated_at' => now(),
            ]);

            if($getCurPic != null)
                $this->hapusGambar($getCurPic);
        }
        else{
            $pegawai->update([
                'fk_idakses' => $validatedData['aksespegawai'],
                'alamatpegawai' => $validatedData['alamatpegawai'],
                'telppegawai' => $validatedData['telppegawai'],
                'jkpegawai' => $validatedData['jkpegawai'],
                'statpegawai' => $validatedData['statpegawai'],
                'updated_at' => now(),
            ]);
            $user->update([
                'nama' => $validatedData['namapegawai'],
                'email' => $validatedData['email'],
                'updated_at' => now(),
            ]);
        }
        return redirect('/pegawai')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::where('fk_iduser',$id)->delete();
        $user = User::find($id);
        $curPic = $user->image;
        $user->delete();
        if($curPic != null)
            $this->hapusGambar($curPic);
        return redirect('/pegawai')->with('delete','Data berhasil dihapus');
    }

    public function hapusGambar($curPic){
        if(file_exists(public_path('storage/image/'.$curPic))){
                unlink(public_path('storage/image/'.$curPic));
            }
            else{
                return redirect('/pegawai');
            }
    }
}
