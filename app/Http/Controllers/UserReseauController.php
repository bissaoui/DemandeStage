<?php

namespace App\Http\Controllers;

use App\Models\Ville;

use App\Models\Langue;
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
        if (auth()->user()->email_verified_at) {
            $RU  =  DB::table('resusers')
                ->join('reseausocs', 'resusers.reseausoc_id', '=', 'reseausocs.id')
                ->where('user_id', $id)
                ->select('reseausocs.id', 'reseausocs.nomReseau', 'reseausocs.photoReseau', 'resusers.username')
                ->get();

            return  view('dashboards.users.Reseau.index', ["data" => $RU, "Cv" => true]);
        }
        $ville = Ville::all();

        return view('dashboards.users.index', ["villes" => $ville, "monCompte" => true]);
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
        $ResUser =  DB::table('resusers')
            ->where('user_id', $id)
            ->select('reseausoc_id')
            ->get();
        $data[] = "1000";
        foreach ($ResUser as $res) {
            $data[] = $res->reseausoc_id;
        }

        $langs = DB::table('reseausocs')
            ->whereNotIn('id', $data)
            ->select('id', 'nomReseau')
            ->get();

        return  view('dashboards.users.Reseau.ajouter', ["langs" => $langs, "Cv" => true]);
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
        $this->validate($request, [
            'username' => 'required',
        ]);
        $resuser = new Resuser();
        $resuser->user_id = auth()->user()->id;
        $resuser->username = $request->username;
        $resuser->reseausoc_id = $request->reseausoc_id;
        $resuser->save();
        $cvCntr = new cvController();
        $cvCntr->cvComplet(auth()->user()->id);
        return redirect('/user/reseau');
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
        $myres = DB::table('reseausocs')
            ->where('id', $id)
            ->select('*')
            ->first();
        $res = DB::table('resusers')
            ->where('user_id', auth()->user()->id)
            ->where('reseausoc_id', $id)
            ->select('*')
            ->first();
        return  view('dashboards.users.Reseau.update', ["res" => $res, "myres" => $myres, "id" => $id, "Cv" => true]);
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

        $resuser = Resuser::where('user_id', '=', auth()->user()->id)
            ->where('reseausoc_id', '=', $id)
            ->first();

        $resuser->username = $request->username;
        $resuser->save();
        return redirect('/user/reseau');
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
        Resuser::where('reseausoc_id', '=', $id)->where('user_id', '=', auth()->user()->id)->delete();
        $cvCntr = new cvController();
        $cvCntr->cvComplet(auth()->user()->id);
        return redirect('user/reseau');
    }
}
