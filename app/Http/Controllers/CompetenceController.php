<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ville;

class CompetenceController extends Controller
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
            $CU  =  DB::table('competences')
                ->join('technologies', 'competences.technologie_id', '=', 'technologies.id')
                ->where('user_id', $id)
                ->select('technologies.id', 'technologies.nomTechnologie', 'competences.niveauCompetence', 'competences.nbAnnee', 'technologies.photoTechnologie')
                ->get();
            return  view('dashboards.users.Competence.index', ["data" => $CU, "Cv" => true]);
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
        $CompetenceUser =  DB::table('competences')
            ->where('user_id', $id)
            ->select('technologie_id')
            ->get();
        $data[] = "1000";
        foreach ($CompetenceUser as $comp) {
            $data[] = $comp->technologie_id;
        }

        $compes = DB::table('technologies')
            ->whereNotIn('id', $data)
            ->select('id', 'nomTechnologie')
            ->get();

        return  view('dashboards.users.Competence.ajouter', ["techs" => $compes, "Cv" => true]);
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
        $competence = new Competence();
        $competence->user_id = auth()->user()->id;
        $competence->technologie_id = $request->technologie_id;
        $competence->niveauCompetence = $request->niveauCompetence;
        $competence->nbAnnee = $request->nbAnnee;
        $competence->save();
        $cvCntr = new cvController();
        $cvCntr->cvComplet(auth()->user()->id);
        return redirect('/user/competence');
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

        $myres = DB::table('technologies')
            ->where('id', $id)
            ->select('*')
            ->first();
        $res = DB::table('competences')
            ->where('user_id', auth()->user()->id)
            ->where('technologie_id', $id)
            ->select('*')
            ->first();
        return  view('dashboards.users.Competence.update', ["langs" => $res, "mylang" => $myres, "id" => $id, "Cv" => true]);
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

        //
        $competence = Competence::where('user_id', '=', auth()->user()->id)
            ->where('technologie_id', '=', $id)
            ->first();

        $competence->niveauCompetence = $request->niveauCompetence;
        $competence->nbAnnee = $request->nbAnnee;
        $competence->save();
        return redirect('/user/competence');
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

        Competence::where('technologie_id', '=', $id)->where('user_id', '=', auth()->user()->id)->delete();
        $cvCntr = new cvController();
        $cvCntr->cvComplet(auth()->user()->id);
        return redirect('user/competence');
    }
}
