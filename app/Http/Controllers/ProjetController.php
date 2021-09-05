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
use Illuminate\Support\Facades\DB;

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

    public function getTechnoprojet($id)
    {
        $techProjet =  DB::table('projteches')
            ->join('technologies', 'technologies.id', '=', 'projteches.technologie_id')
            ->where('projet_id', $id)
            ->select('technologies.nomTechnologie', 'technologies.photoTechnologie')
            ->get();
        return $techProjet;
        return view('dashboards.admins.Projet.details', ["projet" => true, "id" => $id, "techs" => $techProjet]);
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
        $projet = Projet::find($id);
        $userProjet =  DB::table('projusers')
            ->join('users', 'users.id', '=', 'projusers.user_id')
            ->where('projet_id', $id)
            ->select('users.name', 'users.prenom', 'users.photoUser')
            ->get();
        $techProjet =  DB::table('projteches')
            ->join('technologies', 'technologies.id', '=', 'projteches.technologie_id')
            ->where('projet_id', $id)
            ->select('technologies.nomTechnologie', 'technologies.photoTechnologie')
            ->get();
        return view('dashboards.admins.Projet.details', ["projet" => true, "prj" => $projet, "users" => $userProjet, "techs" => $techProjet]);
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

    public function getDateprojet($id)
    {
        $projet = Projet::find($id);
        return view('dashboards.admins.Projet.modifierTemps', ["projet" => true, "prj" => $projet]);
    }
    public function getInfoprojet($id)
    {
        $projet = Projet::find($id);
        return view('dashboards.admins.Projet.modifierInfo', ["projet" => true, "prj" => $projet]);
    }
    public function modDate($req)
    {
        $datefin = explode('/', $req);
        $req = "";
        for ($i = 2; $i >= 0; $i--) {
            if ($i == 0)
                $req .= $datefin[$i];
            else
                $req .= $datefin[$i] . '-';
        }
        return $req;
    }
    public function editDateprojet(Request $request, $id)
    {
        $projet = Projet::find($id);
        $req = [
            "dateDebutPr" => $request->dateDebutPr,
            "dateFinPr" => $request->dateFinPr,
        ];
        $req['dateDebutPr'] = $this->modDate($req['dateDebutPr']);
        $req['dateFinPr'] = $this->modDate($req['dateFinPr']);
        $request['dateDebutPr'] = $req['dateDebutPr'];
        $request['dateFinPr'] = $req['dateFinPr'];
        $this->validate($request, [
            'dateDebutPr' => 'required|before:dateFinPr',
            'dateFinPr' => 'required'
        ]);

        $projet->update($request->all());

        return redirect('/admin/projet/' . $id);
    }
    public function editInfoprojet(Request $request, $id)
    {
        $projet = Projet::find($id);
        $this->validate($request, [
            'nomProjet' => 'required',
            'etatProjet' => 'required'
        ]);
        $projet->update($request->all());
        return redirect('/admin/projet/' . $id);
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
