<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
Use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
   public function index()
    {
        //variable siswa diambil dari Model Siswa ditampilkan dengan paginasi per 10 baris
        $siswa= Siswa::simplepaginate(10);

        //tampilkan ke halaman index siswa sebagai variable siswa
        return view('siswa.index',compact('siswa'))

            //diarraykan nomor dengan variable i pengulangan, ambil dan tampilkan kali 10
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function siswaexport()
    {
        //Excel mendownload dari fungsi siswa export menjadi file siswa.xlsx
     return Excel::download(new SiswaExport, 'Siswa.xlsx');   
    }

    public function siswaimport(Request $request)
    {
        //PROSES VALIDASI FILE EXTENSION HARUS XLS CSV DAN XLS
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        //FILE DIAMBIL
        $file = $request->file('file');

        //FILE DIAMBIL DARI DATA SISWA DAN NAMA FILE BEBAS APA SAJA DIAMBIL DARI FILE APAPUN ASAL XLS
        $nama_file = rand() . $file->getClientOriginalName();

        //FILE DIPINDAHKAN KE FOLDER 
        $file->move('DataSiswa', $nama_file);

        //EXCEL AMBIL DATA KEMUDIAN IMMPORT DENGAN FUNGSI SISWA IMPORT UNTUK BUAT IMPORT BARU DISIMPAN DI FOLDER DATA SISWA DI FOLDER PUBLIC 
        Excel::import(new SiswaImport, public_path('/DataSiswa/' . $nama_file));

        //SELESAI ARAHKAN KEMBALI KE SISWA
        return redirect('siswa');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create',compact('siswa'));
    }


    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
      public function store(Request $request)
    {
        $request->validate([
            'nama_siswa'=> 'required',
            'ttl' => 'required',
            'asal_sekolah' => 'required',
            'nama_ortu' => 'required',


        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {

        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view ('siswa.edit', compact('Siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'nama_siswa'=> 'required',
            'ttl' => 'required',
            'asal_sekolah' => 'required',
            'nama_ortu' => 'required',

        ]);

        $siswa= Siswa::find($id)->update($request->all());

        return redirect()->route('siswa.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $siswa = Siswa::find($id)->delete();
        return redirect()->route('siswa.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
