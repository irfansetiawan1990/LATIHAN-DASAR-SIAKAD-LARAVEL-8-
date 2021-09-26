<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Siswa;

class RombelController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $guru = Guru::all();
        $rombel = Rombel::with('siswa','kelas','guru')->simplepaginate(10);

        return view('rombel.index',compact('rombel','siswa','kelas','guru'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'=> 'required',
            'kelas_id' => 'required',



        ]);

        Rombel::create($request->all());
        return redirect()->route('rombel.index');
                    
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {

        return view('rombel.show', compact('rombel'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view ('Guru.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'siswa_id'=> 'required',
            'kelas_id' => 'required',
    

        ]);

        $rombel = Rombel::find($id)->update($request->all());

        return redirect()->route('rombel.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $rombel = Rombel::find($id)->delete();
        return redirect()->route('rombel.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
