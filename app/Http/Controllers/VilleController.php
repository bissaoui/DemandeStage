<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $villes = Ville::all();
        return view('dashboards.admins.Ville.index', ["villes" => $villes, "ville" => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboards.admins.Ville.ajoute', ["ville" => true]);
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
            'nomVille' => 'unique:villes',
        ]);
        Ville::create($request->all());
        return redirect('/admin/ville');
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
        $ville = Ville::find($id);
        return view('dashboards.admins.ville.modifier', ["vil" => $ville, "ville" => true]);
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
        // Modifier Ville
        $this->validate($request, [
            'nomVille' => 'unique:villes',
        ]);
        $ville = Ville::find($id);
        $ville->update($request->all());



        return redirect('/admin/ville');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ville::destroy($id);
        return redirect('/admin/ville');

        // 'ville est supprimer avec success ';
    }
}
