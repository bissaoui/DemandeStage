<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cvController extends Controller
{
    //

    public function getInfoUser($id)
    {
        $infoUser  = DB::table('users')
            ->join('villes', 'villes.id', '=', 'users.ville_id')
            ->where('users.id', '=', $id)
            ->select('name', 'prenom', 'email', 'ddn', 'adresse', 'photoUser', 'civilite', 'telephone', 'nomVille')
            ->get();
        $Competence = DB::table('competences')
            ->join('technologies', 'technologies.id', '=', 'competences.technologie_id')
            ->where('competences.user_id', '=', $id)
            ->select('nomTechnologie', 'photoTechnologie', 'niveauCompetence')
            ->get();
        $formUsers = DB::table('formusers')
            ->join('formations', 'formations.id', '=', 'formusers.formation_id')
            ->join('ecoles', 'ecoles.id', '=', 'formusers.ecole_id')
            ->where('formusers.user_id', '=', $id)
            ->select('filiere', 'nomEcoleComplet', 'dateDebut', 'dateFin', 'abreviation', 'nomFormation', 'nomEcole')
            ->orderByDesc('dateDebut')
            ->get();
        $langUser =  DB::table('langusers')
            ->join('langues', 'langues.id', '=', 'langusers.langue_id')
            ->where('langusers.user_id', '=', $id)
            ->select('nomLangue', 'niveauLangue')
            ->get();
        $resUser =  DB::table('resusers')
            ->join('reseausocs', 'reseausocs.id', '=', 'resusers.reseausoc_id')
            ->where('resusers.user_id', '=', $id)
            ->select('nomReseau', 'username', 'photoReseau')
            ->get();
        $expeUser  = DB::table('experiences')
            ->where('experiences.user_id', '=', $id)
            ->select('dateDebutEx', 'dateFinEx', 'entreprise', 'fonction', 'tache', 'logoEntreprise')
            ->orderByDesc('dateDebutEx')
            ->get();

        return ["infoUser" => $infoUser, "Competence" => $Competence, "formUsers" => $formUsers, "langUser" => $langUser, "resUser" => $resUser, "expeUser" => $expeUser];
    }
    public function index($id)
    {
        if (auth()->user()->is_admin == 1) {
            $all = $this->getInfoUser($id);
            return  view('dashboards.admins.CV', ["infoUser" => $all['infoUser'], "langUser" => $all["langUser"], "resUser" => $all["resUser"], "formUsers" => $all["formUsers"], "expeUser" => $all["expeUser"], "Competence" => $all["Competence"]]);
        }
    }
}
