<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Mapel;
use App\Models\Guru;


class GuruController extends Controller
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
        
        
        $guru= Guru::simplepaginate(10);

        return view('guru.index',compact('guru'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru'=> 'required',
            'nip'=> 'required',
      

        ]);

       Guru::create($request->all());
        
        return redirect()->route('guru.index');
                    
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {

        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view ('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'nama_guru'=> 'required',
            'nip'=> 'required',

        ]);

        $guru= Guru::find($id)->update($request->all());

        return redirect()->route('guru.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $guru = Guru::find($id)->delete();
        return redirect()->route('guru.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
