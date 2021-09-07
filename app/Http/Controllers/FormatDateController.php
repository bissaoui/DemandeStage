<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormatDateController extends Controller
{
    //
    public function modDate($req)
    {
        $datefin = explode('/', $req);
        $req = "";
        for ($i = 2; $i >= 0; $i--) {
            if ($i == 0)
                $req .= $datefin[$i];
            else
                $req .= $datefin[$i] . '-';
        }
        return $req;
    }
}
