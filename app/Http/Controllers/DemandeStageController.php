<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Ecole;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeStageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth()->user()->email_verified_at) {

            $id = auth()->user()->id;
            $dmds = Demande::all()->where('user_id', '=', $id);
            return view('dashboards.users.demande.index', ['Stage' => true, 'dmds' => $dmds]);
        }
        $ville = Ville::all();

        return view('dashboards.users.index', ["villes" => $ville, "monCompte" => true]);
    }
    public function accepte($id)
    {
        $dmd = Demande::find($id);
        $dmd->statut = 1;
        $dmd->save();

        return redirect('admin\demande');
    }
    public function refuse($id)
    {
        $dmd = Demande::find($id);
        $dmd->statut = 2;
        $dmd->save();
        return redirect('admin\demande');
    }
    public function allDemande()
    {
        $dmds =  DB::table('demandes')
            ->join('users', 'users.id', '=', 'demandes.user_id')
            ->join('ecoles', 'ecoles.id', '=', 'demandes.ecole_id')
            ->select('demandes.user_id', 'demandes.id', 'users.name', 'users.prenom', 'users.photoUser', 'demandes.type', 'demandes.statut', 'demandes.duree', 'ecoles.nomEcole')
            ->get();
        return view('dashboards.admins.Demande.index', ['demande' => true, 'dmds' => $dmds]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ecole = Ecole::all();
        return view('dashboards.users.demande.create', ['Stage' => true, "ecoles" => $ecole]);
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
            'type' => 'required',
            'dateDebutDemande' => 'required|date',
            'duree' => 'required',
            'demande' => 'required'

        ]);
        $dmd = new Demande();

        $dmd->user_id = auth()->user()->id;

        $dmd->type = $request['type'];

        $dmd->dateDebutDemande = $request['dateDebutDemande'];

        $dmd->duree = $request['duree'];

        $dmd->demande = $request['demande'];

        $dmd->ecole_id = $request['ecole_id'];

        $dmd->statut = 0;

        $dmd->save();

        return redirect('user\demande_Stage');
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
        $ecole = Ecole::all();

        $dmd = Demande::find($id);
        return view('dashboards.users.demande.show', ['Stage' => true, 'dmd' => $dmd, "ecoles" => $ecole]);
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
        $ecole = Ecole::all();

        $dmd = Demande::find($id);
        return view('dashboards.users.demande.edit', ['Stage' => true, 'dmd' => $dmd, "ecoles" => $ecole, "id" => auth()->user()->id]);
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
        $this->validate($request, [
            'type' => 'required',
            'dateDebutDemande' => 'required|date',
            'duree' => 'required',
            'demande' => 'required'

        ]);
        $dmd = Demande::find($id);

        $dmd->type = $request['type'];

        $dmd->dateDebutDemande = $request['dateDebutDemande'];

        $dmd->duree = $request['duree'];

        $dmd->demande = $request['demande'];

        $dmd->ecole_id = $request['ecole_id'];

        $dmd->statut = 0;

        $dmd->save();

        return redirect('user\demande_Stage');
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
        $dmd = Demande::find($id);
        $dmd->delete();
        return redirect('user\demande_Stage');
    }
}
