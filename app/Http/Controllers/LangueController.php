<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $langues = Langue::all();
        return view('dashboards.admins.Langue.index', ["langues" => $langues, "langue" => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboards.admins.Langue.ajoute', ["langue" => true]);
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
            'nomLangue' => 'unique:langues',
        ]);
        Langue::create($request->all());
        return redirect('/admin/languee');
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
        $langue = Langue::find($id);
        return view('dashboards.admins.langue.modifier', ["lang" => $langue, "langue" => true]);
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
        // Modifier Langue
        $this->validate($request, [
            'nomLangue' => 'unique:langues',
        ]);
        $langue = Langue::find($id);
        $langue->update($request->all());



        return redirect('/admin/languee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Langue::destroy($id);
        return redirect('/admin/languee');

        // 'langue est supprimer avec ville success ';
    }
}
