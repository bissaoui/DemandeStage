<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Projtech;
use App\Models\Projuser;
use App\Models\Technologie;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projet = Projet::all();
        return view('dashboards.admins.Projet.index', ["projet" => true, "projets" => $projet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $techs = Technologie::all();
        $users = User::all()->where("is_admin", 2);
        return view('dashboards.admins.Projet.ajoute', ["projet" => true, "techs" => $techs, "users" => $users]);
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
        $v = Validator::make($request->all(), [
            'nomProjet' => 'required',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after:dateDebut|date_format:Y-m-d',
            'Technologies' => 'required',
            'users' => 'required'

        ]);

        if (!$v->fails()) {
            $projet = new Projet();
            $projet->nomProjet = $request['nomProjet'];
            $projet->dateDebutPr = $request['dateDebut'];
            $projet->dateFinPr = $request['dateFin'];
            $projet->etatProjet = 'En cours ';
            $technologies = $request->input('Technologies');
            $users = $request->input('users');
            $projet->save();
            $projtech = new Projtech();
            foreach ($technologies as $tech) {
                $projtech = new Projtech();
                $projtech->technologie_id = $tech;
                $projtech->projet_id = $projet->id;
                $projtech->save();
            }
            foreach ($users as $user) {
                $projuser = new Projuser();
                $projuser->user_id = $user;
                $projuser->projet_id = $projet->id;
                $projuser->dateRejoindre = Carbon::now();
                $projuser->save();
            }

            return redirect('/admin/technologie');
        } else {

            return redirect()->back()->withInput()->withErrors($v);
        }
        //$request->input('techs');
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
        Projet::destroy($id);
        return redirect('/admin/projet');
    }
}
