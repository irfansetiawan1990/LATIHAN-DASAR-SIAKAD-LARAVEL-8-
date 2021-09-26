<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Guru;

class MapelController extends Controller
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
        $mapel= Mapel::with('guru')->simplepaginate(10);
        

        return view('mapel.index',compact('mapel','guru'))
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
        return view('Mapel.create',compact('guru'));
    }


    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
      public function store(Request $request)
    {
        $request->validate([
            'kode_mapel'=> 'required',
            'nama_mapel' => 'required',
            'guru_id' => 'required',


        ]);

        Mapel::create($request->all());
        return redirect()->route('mapel.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {

        return view('mapel.show', compact('Mapel'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view ('mapel.edit', compact('Mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'kode_mapel'=> 'required',
            'nama_mapel'=> 'required',
            'guru_id' => 'required',

        ]);

        $mapel= Mapel::find($id)->update($request->all());

        return redirect()->route('mapel.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $mapel = Mapel::find($id)->delete();
        return redirect()->route('mapel.index')
                        ->with('berhasil','data sudah dihapus');
    }

}
