<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Projtech;
use App\Models\Projuser;
use App\Models\Technologie;
use App\Models\User;
use App\Models\Ville;
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
    public function getAllProjetStagaire()
    {
        $id = auth()->user()->id;
        if (auth()->user()->email_verified_at) {

            $projet  =  DB::table('projusers')
                ->join('projets', 'projusers.projet_id', '=', 'projets.id')
                ->where('user_id', auth()->user()->id)
                ->select('nomProjet', 'id', 'etatProjet')
                ->get();
            return view('dashboards.users.Projet.index', ["Projet" => true, "projets" => $projet]);
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

            return redirect('/admin/projet');
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
            ->select('technologies.id', 'technologies.nomTechnologie', 'technologies.photoTechnologie')
            ->get();
        foreach ($techProjet as $user) {
            $data[] = $user->id;
        }

        $techs = DB::table('technologies')
            ->whereNotIn('id', $data)
            ->select('technologies.id', 'technologies.nomTechnologie')
            ->get();
        return view('dashboards.admins.Projet.Technologies', ["projet" => true, "id" => $id, "usedTechs" => $techProjet, "notUsedTechs" => $techs]);
    }


    public function getEquipeprojet($id)
    {
        $userProjet =  DB::table('projusers')
            ->join('users', 'users.id', '=', 'projusers.user_id')
            ->where('projet_id', $id)
            ->select('users.id', 'users.name', 'users.prenom', 'users.photoUser')
            ->get();
        foreach ($userProjet as $user) {
            $data[] = $user->id;
        }

        $users = DB::table('users')
            ->whereNotIn('id', $data)
            ->where('is_admin', 2)
            ->select('users.id', 'users.name', 'users.prenom')
            ->get();
        return view('dashboards.admins.Projet.equipe', ["projet" => true, "id" => $id, "equipe" => $userProjet, "users" => $users]);
    }

    public function storeTechToProjet(Request $request, $id)
    {
        $technologies = $request->input('Technologies');
        $projtech = new Projtech();
        foreach ($technologies as $tech) {
            $projtech = new Projtech();
            $projtech->technologie_id = $tech;
            $projtech->projet_id = $id;
            $projtech->save();
        }

        return redirect('/admin/projet/' . $id . '/techno');
    }
    public function storeUserToProjet(Request $request, $id)
    {
        $users = $request->input('Users');
        $projuser = new Projuser();
        foreach ($users as $user) {
            $projuser = new Projuser();
            $projuser->user_id = $user;
            $projuser->projet_id = $id;
            $projuser->dateRejoindre = Carbon::now();
            $projuser->save();
        }

        return redirect('/admin/projet/' . $id . '/equipe');
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
    public function showProjet($id)
    {
        //

        $idUsers =  DB::table('projusers')
            ->join('users', 'users.id', '=', 'projusers.user_id')
            ->where('projet_id', $id)
            ->select('users.id')
            ->get();
        for ($i = 0; $i < count($idUsers); $i++) {
            # code...idUsers
            if (auth()->user()->id == $idUsers[$i]->id) {

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
                return view('dashboards.users.Projet.details', ["Projet" => true, "prj" => $projet, "users" => $userProjet, "techs" => $techProjet]);
            }
        }
        return redirect('user/projet_Stage');
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

    public function editDateprojet(Request $request, $id)
    {
        $formatDate = new FormatDateController();
        $projet = Projet::find($id);
        $req = [
            "dateDebutPr" => $request->dateDebutPr,
            "dateFinPr" => $request->dateFinPr,
        ];
        $req['dateDebutPr'] = $formatDate->modDate($req['dateDebutPr']);
        $req['dateFinPr'] = $formatDate->modDate($req['dateFinPr']);
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
    public function destroyTech($id, $idTech)
    {
        //
        DB::table('projteches')->where('projet_id', $id)->where('technologie_id', $idTech)->delete();
        return redirect('/admin/projet/' . $id . '/techno');
    }
    public function destroyUser($id, $idUser)
    {
        //
        DB::table('projusers')->where('projet_id', $id)->where('user_id', $idUser)->delete();
        return redirect('/admin/projet/' . $id . '/equipe');
    }
}
