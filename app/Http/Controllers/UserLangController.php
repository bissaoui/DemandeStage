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

        $RU  =  DB::table('langusers')
            ->join('langues', 'langusers.langue_id', '=', 'langues.id')
            ->where('user_id', $id)
            ->select('langues.id', 'langues.nomLangue', 'langusers.niveauLangue')
            ->get();

        return  view('dashboards.users.Langue.index', ["data" => $RU]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
