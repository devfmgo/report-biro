<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulan;
use Auth;
use Alert;
class BulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bulan.create');
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
           'tanggal' => 'required'
       ]);

       Bulan::create([
           'tanggal'  => $request->tanggal,
           'users_id' => Auth::user()->id
       ]);
       return redirect('/history')->withToastSuccess('Created Successfully');
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
        switch ($request->action) {
            case 1: 
                $request->validate([
                'tanggal' => 'required'
                ]);
                Bulan::find($id)->update([
                    'tanggal' => $request->tanggal,
                ]);
                return redirect('/history')->withToastSuccess('Updated Successfully');
                break;
            case 2     : 
                 Bulan:: find($id)->update([
                    'archive' => 1,
                ]);
                return redirect('/history')->withToastSuccess('Archived Successfully');
                break;
            case 3     : 
                 Bulan:: find($id)->update([
                    'archive' => 0,
                ]);
                return redirect('/archive')->withToastSuccess('Unarchived Successfully');
                break;
            default: 
                # code...
                break;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
