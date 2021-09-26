<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Prodi;



class ProdiController extends Controller
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
         $fakultas = Fakultas::all();
         $prodi = Prodi::with('fakultas')->simplepaginate(10);
        return view('prodi.index',compact('prodi','fakultas'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
 {
        $request -> validate([
            'nama'=> 'required',
            'fakultas_id'=> 'required',


        ]);

        Prodi::create($request->all());
        
        return redirect()->route('prodi.index');
                    
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {

        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view ('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'nama'=> 'required',
            'fakultas_id'=> 'required',


        ]);

        $prodi= Prodi::find($id)->update($request->all());

        return redirect()->route('prodi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $prodi = Prodi::find($id)->delete();
        return redirect()->route('prodi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
