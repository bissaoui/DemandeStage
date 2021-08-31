<?php

namespace App\Http\Controllers;

use App\Models\Technologie;
use Illuminate\Http\Request;

class TechnologieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tech = Technologie::all();
        return view('dashboards.admins.Technologie.index', ["technologies" => $tech, "technologie" => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboards.admins.Technologie.ajoute', ["technologie" => true]);
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
            'nomTechnologie' => 'unique:technologies',
        ]);
        $tech = new Technologie();
        $tech->nomTechnologie = $request['nomTechnologie'];
        if (!empty($request['photoTechnologie'])) {
            $upfile = new UploadFileController();

            $tech->photoTechnologie = $upfile->upload($request['photoTechnologie'], "public/Pictures/Technologie");
        }
        $tech->save();
        return redirect('/admin/technologie');
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
        $tech = Technologie::find($id);
        return view('dashboards.admins.Technologie.modifier', ["tech" => $tech, "technologie" => true]);
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


        $tech = Technologie::find($id);
        $tech->nomTechnologie = $request['nomTechnologie'];
        if (!empty($request['photoTechnologie'])) {
            $upfile = new UploadFileController();
            $tech->photoTechnologie = $upfile->upload($request['photoTechnologie'], "public/Pictures/Technologie");
        }
        $tech->save();
        return redirect('/admin/technologie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Technologie::destroy($id);
        return redirect('/admin/technologie');
        // 'tech est supprimer avec success ';
    }
}
