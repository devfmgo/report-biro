<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UnitKerja;
use App\Models\Biro;
use App\Models\User;
use Alert;
class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('unitkerja.index')->with('kerja',UnitKerja::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unitkerja.create')->with('biro',Biro::all())->with('users',User::all());
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
              'biro_id'  => 'required',
              'users_id' => 'required'
        ]);
        $cekuser = UnitKerja::where('users_id',$request->users_id)->get();
        if ($cekuser) {
            UnitKerja::where('users_id',$request->users_id)->update([
                'biro_id' => $request->biro_id
            ]);
        }else{
            UnitKerja::create([
                'biro_id'  => $request->biro_id,
                'users_id' => $request->users_id
            ]);
        }
        

        return redirect('/unitkerja')->withToastSuccess('Created Successfully!');
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
        return view('unitkerja.edit')->with('kerja',UnitKerja::where('id',$id)->first())->with('biro',Biro::all());
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
            'biro_id' => 'required'
        ]);

        UnitKerja::where('id',$id)->update([
            'biro_id' => $request->biro_id
        ]);
        return redirect('/unitkerja')->withToastSuccess('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UnitKerja:: where('id',$id)->delete();
        return redirect('/unitkerja')->withToastSuccess('Deleted Successfully!');
    }
}
