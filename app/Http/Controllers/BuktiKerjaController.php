<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\BuktiKerja;
use App\Models\Deskripsi;
use Alert;
class BuktiKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('buktikerja.index')->with('kerja',BuktiKerja::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buktikerja.create')->with('deskripsi',Deskripsi::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'id_deskripsi'=>'required',

        ]);

        BuktiKerja::create([
            'title'=>$request->title,
            'id_deskripsi'=>$request->id_deskripsi
        ]);

        return redirect('/buktikerja')->withToastSuccess('Created Successfully!');
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
        return view ('buktikerja.edit')->with('buktikerja',BuktiKerja::where('id',$id)->first())->with('deskripsi',Deskripsi::all());
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
        $request->validate([
            'title'=>'required',
            'id_deskripsi'=>'required',

        ]);

        BuktiKerja::where('id',$id)->update([
            'title'=>$request->title,
            'id_deskripsi'=>$request->id_deskripsi,
        ]);
        return redirect('/buktikerja')->withToastSuccess('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BuktiKerja::where('id',$id)->delete();
        return redirect('/buktikerja')->withToastSuccess('Deleted Successfully!');
    }
}
