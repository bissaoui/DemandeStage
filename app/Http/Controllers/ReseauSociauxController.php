<?php

namespace App\Http\Controllers;

use App\Models\Reseausoc;
use Illuminate\Http\Request;

class ReseauSociauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reseau = Reseausoc::all();
        return view('dashboards.admins.Reseau.index', ["reseaux" => $reseau, "reseau" => true]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboards.admins.Reseau.ajoute', ["reseau" => true]);
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
            'nomReseau' => 'unique:reseausocs',
        ]);
        $res = new Reseausoc();
        $res->nomReseau = $request['nomReseau'];
        if (!empty($request['photoReseau'])) {
            $upfile = new UploadFileController();

            $res->photoReseau = $upfile->upload($request['photoReseau'], "public/Pictures/Reseau");
        }
        $res->save();
        return redirect('/admin/reseaux');
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
        $res = Reseausoc::find($id);
        return view('dashboards.admins.Reseau.modifier', ["res" => $res, "reseau" => true]);
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
        // Modifier 


        $res = Reseausoc::find($id);
        $res->nomReseau = $request['nomReseau'];
        if (!empty($request['photoReseau'])) {
            $upfile = new UploadFileController();
            $res->photoReseau = $upfile->upload($request['photoReseau'], "public/Pictures/Reseau");
        }
        $res->save();
        return redirect('/admin/reseaux');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reseausoc::destroy($id);
        return redirect('/admin/reseaux');
        // 'tech est supprimer avec success ';
    }
}
