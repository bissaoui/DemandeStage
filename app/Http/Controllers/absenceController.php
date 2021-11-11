<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abs = DB::table('absences')
            ->select(DB::raw('count(date_abs) as nbr_abs'))

            ->where('user_id', '=', auth()->user()->id)

            ->get();
        return view('dashboards.users.absence.index', ['abs' => $abs, 'absence' => true]);
    }
    public function indexAdmin()
    {
        //$
        $date1 = Carbon::now()->format('Y/m/d');
        $date = Carbon::now();

        $stgs  =  DB::table('users')
            ->join('demandes', 'demandes.user_id', '=', 'users.id')
            ->where('demandes.statut', 1)
            ->whereNotIn('users.id', DB::table('absences')->select('user_id')->where('date_abs', $date1))
            ->select('*')
            ->get();

        $abss = Absence::all();
        $nbr_abs  =  DB::table('absences')
            ->select(DB::raw('count(user_id) as nbr_abs'), 'date_abs')
            ->groupBy('date_abs')
            ->get();
        return view('dashboards.admins.absence.index', ["absence" => true, 'users' => $stgs, 'nbr_abs' => $nbr_abs, 'all' => $abss, "date" => $date]);
    }

    public function absence()
    {
        $nbr_abs  =  DB::table('absences')
            // ->select(DB::raw('count(user_id) as nbr_abs') ,'date_abs')
            // ->groupBy('user_id')
            ->select('*')
            ->where('user_id', auth()->user()->id)
            ->get();
        return $this->eventsToArray($nbr_abs);
    }

    public function eventsToArray($events)
    {
        $eventArray = [];
        foreach ($events as $event) {
            if ($event->statut == '0') {
                $data = [
                    "title" => "absence non justifie",
                    "start" => $event->date_abs,
                    "end" => $event->date_abs,
                    "backgroundColor" => 'red'
                ];
            } else {
                $data = [
                    "title" => "absence justifie",
                    "start" => $event->date_abs,
                    "end" => $event->date_abs,
                    "backgroundColor" => 'green'
                ];
            }
            array_push($eventArray, $data);
        }
        return response()->json($eventArray);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $abs = new Absence();

        $abs->user_id = $request['user_id'];
        $abs->date_abs = Carbon::now();
        $abs->statut = $request['statut'];

        $abs->save();
        return redirect('admin/absence');
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
        $abss  =  DB::table('absences')
            ->join('users', 'absences.user_id', '=', 'users.id')
            ->where('absences.date_abs', $id)
            ->select('absences.user_id', 'absences.statut', 'absences.date_abs', 'users.name', 'users.prenom', 'users.photoUser')
            ->get();
        return view('dashboards.admins.absence.show', ['abss' => $abss, 'date' => $id]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idUser)
    {
        //
        $abss  =  DB::table('absences')
            ->where('absences.date_abs', $id)
            ->where('absences.user_id', $idUser)->delete();

        return redirect('admin/absence/' . $id);
    }
}
