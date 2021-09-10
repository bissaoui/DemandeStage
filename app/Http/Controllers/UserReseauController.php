<?php

namespace App\Http\Controllers;

use App\Models\Reseausoc;
use App\Models\Resuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //              
        $id = auth()->user()->id;

        $RU  =  DB::table('resusers')
            ->join('reseausocs', 'resusers.reseausoc_id', '=', 'reseausocs.id')
            ->where('user_id', $id)
            ->select('reseausocs.id', 'reseausocs.nomReseau', 'reseausocs.photoReseau', "resusers.url", 'resusers.username')
            ->get();

        return  view('dashboards.users.Reseau.index', ["data" => $RU]);
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
    public function show()
    {
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
        $RU = Resuser::where('reseausoc_id', '=', $id)->where('user_id', '=', auth()->user()->id)->delete();
        return redirect('user/reseau');
    }
}
