<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Guru;

class KelasController extends Controller
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
        $guru = Guru::all();
        $kelas = Kelas::with('guru')->simplepaginate(10);

        return view('kelas.index',compact('kelas','guru'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'=> 'required',
            'guru_id' => 'required',

        ]);

        Kelas::create($request->all());
        return redirect()->route('kelas.index');
                    
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Guru $kelas )
    {

        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view ('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'nama_kelas'=> 'required',
            'guru_id' => 'required',

        ]);

        $kelas = Kelas::find($id)->update($request->all());

        return redirect()->route('kelas.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $kelas  = Kelas::find($id)->delete();
        return redirect()->route('kelas.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
