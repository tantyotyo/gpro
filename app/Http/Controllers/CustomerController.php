<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use App\Models\Akses;
use App\Models\Pegawai;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index', [
            'customer' => Customer::with(['akses:id,namaakses'])->get(),
            'kota' => Kota::all(),
            'pegawai' => Pegawai::select('pegawai.id','users.nama')
                ->join('users','pegawai.fk_iduser','=','users.id')
                ->join('akses','pegawai.fk_idakses','=','akses.id')
                ->where('akses.namaakses','marketing')
                ->where('pegawai.statpegawai',1)
                ->get(),
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
        $akses = Akses::where('namaakses', 'customer')->first();
        // dd($akses);
        $validatedData = $request->validate([
            'namacustomer' => 'required|max:50',
            'imgupload' => 'image|file|max:1024',
            'alamatcustomer' => 'required|max:100',
            'kotacustomer' => 'required',
            'telpcustomer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'telp2customer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'email' => 'required|email|unique:users,email',
            'faxcustomer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'namapiccustomer' => 'required|max:25',
            'telppiccustomer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'idpegawai' => 'required',
            'topcustomer' => 'required|between:1,2|gte:7|lte:30',
        ],[
            'kotacustomer.required' => 'silahkan pilih kotanya',
            'idpegawai.required' => 'silahkan pilih merketingnya',
            'unique' => 'email sudah terdaftar, gunakan email lain',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'imgupload.file' => 'file yang diupload harus berupa gambar',
            'imgupload.max' => 'ukuran file tidak boleh lebih dari 1 MB',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
            'between' => 'nilai angka minimal :min digit, maksimal :max digit',
            'gte' => 'nilai angka harus lebih dari atau sama dengan :value',
            'lte' => 'nilai angka harus kurang dari atau sama dengan :value',
        ]);
        
        if($request->file('imgupload')){
            $extensi = $request->imgupload->extension();
            $imgname = $request->namapiccustomer.'_'.date('dmyHis');
            $request->imgupload->storeAs('image',$imgname.'.'.$extensi);
            User::create([
                'nama' => $validatedData['namapiccustomer'],
                'email' => $validatedData['email'],
                'image' => $imgname.'.'.$extensi,
                // 'username' => 'CUSTOMER'.strtoupper(explode(' ', trim($validatedData['namapiccustomer']))[0]),
                'password' => Hash::make('CUSTOMER'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userId = User::where('nama',$validatedData['namapiccustomer'])->first()->id;
            Customer::create([
                'fk_iduser' => $userId,
                'fk_idpegawai' => $validatedData['idpegawai'],
                'fk_idakses' => $akses->id,
                'fk_idkota' => $validatedData['kotacustomer'],
                'namacustomer' => $validatedData['namacustomer'],
                'alamatcustomer' => $validatedData['alamatcustomer'],
                'telpcustomer' => $validatedData['telpcustomer'],
                'telp2customer' => $validatedData['telp2customer'],
                'faxcustomer' => $validatedData['faxcustomer'],
                'telppiccustomer' => $validatedData['telppiccustomer'],
                'topcustomer' => $validatedData['topcustomer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        else{
            User::create([
                'nama' => $validatedData['namapiccustomer'],
                'email' => $validatedData['email'],
                // 'username' => 'CUSTOMER'.strtoupper(explode(' ', trim($validatedData['namapiccustomer']))[0]),
                'password' => Hash::make('CUSTOMER'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userId = User::where('nama',$validatedData['namapiccustomer'])->first()->id;
            Customer::create([
                'fk_iduser' => $userId,
                'fk_idpegawai' => $validatedData['idpegawai'],
                'fk_idakses' => $akses->id,
                'fk_idkota' => $validatedData['kotacustomer'],
                'namacustomer' => $validatedData['namacustomer'],
                'alamatcustomer' => $validatedData['alamatcustomer'],
                'telpcustomer' => $validatedData['telpcustomer'],
                'telp2customer' => $validatedData['telp2customer'],
                'faxcustomer' => $validatedData['faxcustomer'],
                'telppiccustomer' => $validatedData['telppiccustomer'],
                'topcustomer' => $validatedData['topcustomer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect('/customer')->with('input','Data berhasil ditambah');
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
        return view('customer.edit',[
            'customer' => Customer::with(['user','akses:id,namaakses',])->where('fk_iduser',base64_decode($id))->first(),
            'kota' => Kota::all(),
            'pegawai' => Pegawai::select('pegawai.id','users.nama')
                ->join('users','pegawai.fk_iduser','=','users.id')
                ->join('akses','pegawai.fk_idakses','=','akses.id')
                ->where('akses.namaakses','marketing')
                ->where('pegawai.statpegawai',1)
                ->get(),
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
        $customer = Customer::where('fk_iduser',base64_decode($id))->first();
        $users = User::find(base64_decode($id));
        $getCurPic = $users->image;
        $kota = Kota::find($request->kotacustomer);
        
        $validatedData = $request->validate([
            'namacustomer' => 'required|max:50',
            'imgupload' => 'image|file|max:1024',
            'alamatcustomer' => 'required|max:100',
            'kotacustomer' => 'required',
            'telpcustomer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'telp2customer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'email' => 'required|email',
            'faxcustomer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'namapiccustomer' => 'required|max:25',
            'telppiccustomer' => 'required|regex:/^([0-9\+\(])([0-9\s\-\.\)])*$/|min:10|max:14',
            'idpegawai' => 'required',
            'topcustomer' => 'required|between:1,2|gte:7|lte:30',
        ],[
            'aksescus.required' => 'silahkan pilih hak aksesnya dulu',
            'kotacustomer.required' => 'silahkan pilih kotanya dulu',
            'required' => 'field tidak boleh kosong',
            'regex' => 'gunakan karakter (0-9 / + / - / spasi / () /), tanpa huruf',
            'imgupload.file' => 'file yang diupload harus berupa gambar',
            'imgupload.max' => 'ukuran file tidak boleh lebih dari 1 MB',
            'max' => 'data tidak boleh lebih dari :max karakter',
            'min' => 'data tidak boleh kurang dari :min karakter',
            'unique' => 'email sudah terdaftar, harap menggunakan email lain',
        ]);

        if($request->imgupload){
            $extensi = $request->imgupload->extension();
            $imgname = $request->namapiccustomer.'_'.date('dmyHis');
            $request->imgupload->storeAs('image',$imgname.'.'.$extensi);

            $customer->update([
                'fk_idpegawai' => $request->idpegawai,
                'fk_idkota' => $request->kotacustomer,
                'namacustomer' => $request->namacustomer,
                'alamatcustomer' => $request->alamatcustomer,
                'telpcustomer' => $request->telpcustomer,
                'telp2customer' => $request->telp2customer,
                'faxcustomer' => $request->faxcustomer,
                'telppiccustomer' => $request->telppiccustomer,
                'topcustomer' => $request->topcustomer,
                'updated_at' => now(),
            ]);
            $users->update([
                'nama' => $request->namapiccustomer,
                'email' => $request->email,
                'image' => $imgname.'.'.$extensi,
                'updated_at' => now(),
            ]);

            if($getCurPic != null)
                $this->hapusGambar($getCurPic);
        }
        else{
            $customer->update([
                'fk_idpegawai' => $request->idpegawai,
                'fk_idkota' => $request->kotacustomer,
                'namacustomer' => $request->namacustomer,
                'alamatcustomer' => $request->alamatcustomer,
                'telpcustomer' => $request->telpcustomer,
                'telp2customer' => $request->telp2customer,
                'faxcustomer' => $request->faxcustomer,
                'telppiccustomer' => $request->telppiccustomer,
                'topcustomer' => $request->topcustomer,
                'updated_at' => now(),
            ]);
            $users->update([
                'nama' => $request->namapiccustomer,
                'email' => $request->email,
                'updated_at' => now(),
            ]);
        }
        return redirect('/customer')->with('update','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('fk_iduser',$id)->delete();
        $users = User::find($id);
        $getCurPic = $users->image;
        $users->delete();
        if($getCurPic != null)
            $this->hapusGambar($getCurPic);
        return redirect('/customer')->with('delete','Data berhasil dihapus');
    }

    public function hapusGambar($curPic){
        if(file_exists(public_path('storage/image/'.$curPic))){
                unlink(public_path('storage/image/'.$curPic));
            }
            else{
                return redirect('/customer');
            }
    }
}
