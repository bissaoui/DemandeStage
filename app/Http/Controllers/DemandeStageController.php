<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Ecole;
use Illuminate\Http\Request;

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
        $id = auth()->user()->id;
        $dmds = Demande::all()->where('user_id', '=', $id);
        return view('dashboards.users.demande.index', ['Stage' => true, 'dmds' => $dmds]);
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
