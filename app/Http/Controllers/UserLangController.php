<?php

namespace App\Http\Controllers;

use App\Models\Languser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UserLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = auth()->user()->id;

        $LU  =  DB::table('langusers')
            ->join('langues', 'langusers.langue_id', '=', 'langues.id')
            ->where('user_id', $id)
            ->select('langues.id', 'langues.nomLangue', 'langusers.niveauLangue')
            ->get();

        return  view('dashboards.users.Langue.index', ["data" => $LU, "Cv" => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $id = auth()->user()->id;
        $LanUser =  DB::table('langusers')
            ->where('user_id', $id)
            ->select('langue_id')
            ->get();
        $data[] = "1000";
        foreach ($LanUser as $lan) {
            $data[] = $lan->langue_id;
        }

        $langs = DB::table('langues')
            ->whereNotIn('id', $data)
            ->select('id', 'nomLangue')
            ->get();

        return  view('dashboards.users.Langue.ajouter', ["langs" => $langs, "Cv" => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $languser = new Languser();
        $languser->user_id = auth()->user()->id;
        $languser->langue_id = $request->langue;
        $languser->niveauLangue = $request->niveauLangue;
        $languser->save();
        return redirect('/user/langue');
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
        //


        $myres = DB::table('langues')
            ->where('id', $id)
            ->select('*')
            ->first();
        $res = DB::table('langusers')
            ->where('user_id', auth()->user()->id)
            ->where('langue_id', $id)
            ->select('*')
            ->first();
        return  view('dashboards.users.Langue.update', ["langs" => $res, "mylang" => $myres, "id" => $id, "Cv" => true]);
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
        //
        $languser = Languser::where('user_id', '=', auth()->user()->id)
            ->where('langue_id', '=', $id)
            ->first();

        $languser->niveauLangue = $request->niveauLangue;
        $languser->save();
        return redirect('/user/langue');
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
        Languser::where('langue_id', '=', $id)->where('user_id', '=', auth()->user()->id)->delete();
        return redirect('user/langue');
    }
}
