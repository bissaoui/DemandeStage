<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
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

        $LU  =  DB::table('experiences')
            ->where('user_id', $id)
            ->select('*')
            ->get();

        return  view('dashboards.users.Experience.index', ["data" => $LU, "Cv" => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('dashboards.users.Experience.ajouter', ["Cv" => true]);
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

        $this->validate($request, [
            'tache' => 'required',
            'dateDebutEx' => 'required|date',
            'dateFinEx' => 'required|date|after:dateDebut|date_format:Y-m-d',
            'entreprise' => 'required',
            'fonction' => 'required'

        ]);
        $exp = new Experience();

        $exp->entreprise = $request['entreprise'];
        $exp->tache = $request['tache'];
        $exp->fonction = $request['fonction'];
        $exp->dateDebutEx = $request['dateDebutEx'];
        $exp->dateFinEx = $request['dateFinEx'];
        $exp->user_id = auth()->user()->id;

        if (!empty($request['logoEntreprise'])) {
            $upfile = new UploadFileController();

            $exp->logoEntreprise = $upfile->upload($request['logoEntreprise'], "public/Pictures/Entreprise");
        }
        $exp->save();
        return redirect('/user/experience');
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
        $exp = Experience::find($id);
        return view('dashboards.users.Experience.update', ["exp" => $exp,  "Cv" => true, "id" => $id]);
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


        $exp = Experience::find($id);

        $exp->entreprise = $request['entreprise'];
        $exp->tache = $request['tache'];
        $exp->fonction = $request['fonction'];
        $exp->dateDebutEx = $request['dateDebutEx'];
        $exp->dateFinEx = $request['dateFinEx'];
        $exp->user_id = auth()->user()->id;

        if (!empty($request['logoEntreprise'])) {
            $upfile = new UploadFileController();

            $exp->logoEntreprise = $upfile->upload($request['logoEntreprise'], "public/Pictures/Entreprise");
        }
        $exp->save();
        return redirect('/user/experience');
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
        Experience::destroy($id);
        return redirect('/user/experience');
    }
}
