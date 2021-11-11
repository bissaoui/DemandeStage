<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        if (auth()->user()->email_verified_at == NULL) {
            $ville = Ville::all();
            return view('dashboards.users.index', ["villes" => $ville, "monCompte" => true]);
        } else
            return view('dashboards.users.dashboard', ["dash" => true]);;
    }

    public function settings()
    {
        $ville = Ville::all();
        return view('dashboards.users.settings', ["villes" => $ville, "monCompte" => true]);
    }
    public function password()
    {
        return view('dashboards.users.password', ["monCompte" => true]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function profile()
    {
        $ville = Ville::all();

        return view('dashboards.users.profile', ["villes" => $ville, "monCompte" => true]);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            "Actuel" => "required",
            "Nouveau" => ['required', 'min:8'],
            "Confirmer" => "required|same:Nouveau"
        ]);

        if (Hash::check($request->Actuel, $user->password))
            $user->password = bcrypt($request->Nouveau);
        else
            return redirect('/user/password')->with('Actuel', true);

        $user->save();
        return redirect('/user/password')->with('message', 'vous avez changer votre mot de passe avec success!');
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
        $user = User::find($id);
        $formatDate = new FormatDateController();

        $req = [
            "ddn" => $request->ddn,
        ];
        $req['ddn'] = $formatDate->modDate($req['ddn']);
        $request['ddn'] = $req['ddn'];

        $this->validate($request, [
            "name" => "required",
            "prenom" => "required",
            "ddn" => "required",
            "ville_id" => "required",
            "civilite" => "required",
            "adresse" => "required",
            "telephone" => "required",
            "Description" => "Description"
        ]);

        $user->name = $request['name'];
        $user->prenom = $request['prenom'];
        $user->civilite = $request['civilite'];
        $user->ddn = $request['ddn'];
        $user->ville_id = $request['ville_id'];
        $user->adresse = $request['adresse'];
        $user->telephone = $request['telephone'];

        $user->Description = $request['Description'];
        $user->email_verified_at = Carbon::now();
        if (!empty($request['photoUser'])) {

            $upfile = new UploadFileController();
            $user->photoUser = $upfile->upload($request['photoUser'], "public/Pictures/Profile");
        }
        $user->save();

        return redirect('/user/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);
        return redirect('/users');
    }
}
