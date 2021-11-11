<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Formation;
use App\Models\Formuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ville;

class FormationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $id = auth()->user()->id;
        if (auth()->user()->email_verified_at) {

            $LU  =  DB::table('formusers')
                ->join('ecoles', 'formusers.ecole_id', '=', 'ecoles.id')
                ->join('formations', 'formusers.formation_id', 'formations.id')
                ->where('user_id', $id)
                ->select('ecoles.nomEcole', 'formations.abreviation', 'formusers.dateDebut', 'formusers.dateFin', 'formusers.filiere', 'formusers.nomEcoleComplet')
                ->get();

            return  view('dashboards.users.Formation.index', ["data" => $LU, "Cv" => true]);
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
        $ecoles = Ecole::all();
        $formations = Formation::all();
        return  view('dashboards.users.Formation.ajouter', ["Cv" => true, "ecoles" => $ecoles, "formations" => $formations]);
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



        //
        $formuser = new Formuser();
        $formuser->user_id = auth()->user()->id;
        $formuser->ecole_id = $request->ecole_id;
        $formuser->formation_id = $request->formation_id;
        $formuser->filiere = $request->filiere;
        $formuser->nomEcoleComplet = $request->nomEcoleComplet;
        $formuser->dateDebut = $request->dateDebut;
        $formuser->dateFin = $request->dateFin;


        $formuser->save();
        $cvCntr = new cvController();
        $cvCntr->cvComplet(auth()->user()->id);
        return redirect('/user/formation');
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


        $LU  =  DB::table('formusers')
            ->join('ecoles', 'formusers.ecole_id', '=', 'ecoles.id')
            ->join('formations', 'formusers.formation_id', 'formations.id')
            ->where('user_id', auth()->user()->id)
            ->where('dateDebut', $id)
            ->select('ecoles.id as id_ecole', 'ecoles.nomEcole', 'formations.id as id_formation', 'formations.abreviation', 'formusers.dateFin', 'formusers.dateDebut', 'formusers.filiere', 'formusers.nomEcoleComplet')
            ->get();
        return  view('dashboards.users.Formation.update', ["Cv" => true, "data" => $LU, "id" => $id]);
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
        $formuser = Formuser::where('dateDebut', '=', $id)->where('user_id', '=', auth()->user()->id)->first();;
        $formuser->filiere = $request->filiere;
        $formuser->nomEcoleComplet = $request->nomEcoleComplet;
        $formuser->dateDebut = $request->dateDebut;
        $formuser->dateFin = $request->dateFin;
        $formuser->save();
        return redirect('/user/formation');
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
        Formuser::where('dateDebut', '=', $id)->where('user_id', '=', auth()->user()->id)->delete();
        $cvCntr = new cvController();
        $cvCntr->cvComplet(auth()->user()->id);
        return redirect('/user/formation');
    }
}
