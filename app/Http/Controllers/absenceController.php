<?php

namespace App\Http\Controllers;

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
        return view('dashboards.users.absence.index', ['abs' => $abs]);
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
    }
}
