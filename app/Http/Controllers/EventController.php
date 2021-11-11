<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $nbr_abs  =  DB::table('absences')
            ->select(DB::raw('count(user_id) as nbr_abs'), 'date_abs')
            ->groupBy('date_abs')
            ->get();
        return $this->eventsToArray($nbr_abs);
    }

    public function eventsToArray($events)
    {
        $eventArray = [];
        foreach ($events as $event) {
             $nbr_abs =  DB::table('absences')
                ->join('users', 'absences.user_id', '=', 'users.id')
                ->where('date_abs', '=', $event->date_abs)
                ->select('users.name', 'users.prenom', 'user_id')
                ->get();
            $data = [
                "title" => $event->nbr_abs . " Abs",
                "start" => $event->date_abs,
                "end" => $event->date_abs,
                "className" => 'bg-success'
            ];
            array_push($eventArray, $data);
        }
        return response()->json($eventArray);
    }
}
