<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biro;
Use Alert;
class BiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('biro.index')->with('biro',Biro::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biro.create');
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
           'nama_biro'=>'required',
           'jum_staff'=>'required'
       ]);

       Biro::create([
           'nama_biro'=>$request->nama_biro,
           'jum_staff'=>$request->jum_staff
       ]);
       return redirect('/biro')->withToastSuccess('Created Successfully!');
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

        return view('biro.edit')->with('biro',Biro::where('id',$id)->first());
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
            'nama_biro'=>'required',
            'jum_staff'=>'required'
        ]);

        Biro::where('id',$id)->update([
            'nama_biro'=>$request->nama_biro,
            'jum_staff'=>$request->jum_staff
        ]);

        return redirect('/biro')->withToastSuccess('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Biro::where('id',$id)->delete();
        return redirect('/biro')->withToastSuccess('Deleted Successfully!');
    }
}
