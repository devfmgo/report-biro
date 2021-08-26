<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\Biro;
use App\Models\UnitKerja;
use App\Models\History;
use App\Models\BuktiKerja;
use App\Models\Bulan;
use DB;
class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kerja = BuktiKerja::with('deskripsi')->get();
        $biro  = UnitKerja::with('biro')->user()->first();
        $bulan = Bulan::with('user')
                        ->where('archive',0)
                        ->orderBy('tanggal','DESC')
                        ->paginate(5);

        $history = History::user()->get();
        
        return view('history.index',compact('history','bulan','kerja','biro'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
        $biro = DB::table('unit_kerja')
        ->join('biro','unit_kerja.biro_id','=','biro.id')
        ->join('users','unit_kerja.users_id','=','users.id')
        ->where('users_id',Auth::user()->id)
        ->get()->first();

        return view('history.create')
        ->with('id_bukti_kerja',$request->id_bukti_kerja)
        ->with('id_bulan',$request->id_bulan)
        ->with('biro',$biro->jum_staff);
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
            'target_p1' => 'required',
            'target_p2' => 'required',
            'target_p3' => 'required',
            'target_p4' => 'required',
            'kendala'   => '',
            'catatan'   => ''
        ]);
                                      $target   = $request->only('target_p1','target_p2','target_p3','target_p4');
                                      $hasil    = ['hasil_p1'=>0,'hasil_p2'=>0,'hasil_p3'=>0,'hasil_p4'=>0];
                         $targetArray['data']   = json_encode($target);
                         $hasilArray  ['hasil'] = json_encode($hasil);
        History::create([
            'users_id'       => Auth::user()->id,
            'id_bukti_kerja' => $request->id_bukti_kerja,
            'id_bulan'       => $request->id_bulan,
            'P1'             => $targetArray['data'],
            'P2'             => $hasilArray['hasil']
        ]);
        return redirect('history')->withToastSuccess('Created Successfully !');

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

        return view('history.edit')->with('history',History::find($id));

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
            'hasil_p1' => 'required',
            'hasil_p2' => 'required',
            'hasil_p3' => 'required',
            'hasil_p4' => 'required',
            'kendala'  => '',
            'catatan'  => ''
        ]);
                                    $hasil   = ['hasil_p1'=>$request->hasil_p1,'hasil_p2'=>$request->hasil_p2,'hasil_p3'=>$request->hasil_p3,'hasil_p4'=>$request->hasil_p4];
                        $hasilArray['hasil'] = json_encode($hasil);
        History::find($id)->update([
            'P2'      => $hasilArray['hasil'],
            'kendala' => $request->kendala,
            'catatan' => $request->catatan
        ]);
        return redirect('history')->withToastSuccess('Updated Successfully !');
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

    public function archive(){
       
        $hasilkerja = DB::table('bukti_kerja')
        ->join('history','bukti_kerja.id','=','history.id_bukti_kerja')
        ->get();
        $kerja   = BuktiKerja::all();
        $history = DB::table('history')->get();
        $biro    = UnitKerja::with('biro')->user()->first();;
        $bulan   = Bulan::Where('users_id',Auth::user()->id)
        ->orderBy('tanggal','DESC')
        ->where('archive',1)
        ->paginate(5);

        return view('history.archive',compact('history','bulan','kerja','hasilkerja','biro'));
    }

    // admin view 
    public function reportBiro(){
        
        $users = DB::table('users')
        ->join('role_user','users.id','=','role_user.user_id')
        ->join('unit_kerja','users.id','=','unit_kerja.users_id')
        ->join('biro','unit_kerja.biro_id','=','biro.id')
        ->where('role_id',2)
        ->get();
        $report = DB::table('history')
                    ->join('users','history.users_id','=','users.id')
                    ->join('bulan','history.id_bulan','=','bulan.id')
                    ->get();
                   
       return view('reportbiro.index',compact('report','users'))->with('bulan',Bulan::all());
    }
}
