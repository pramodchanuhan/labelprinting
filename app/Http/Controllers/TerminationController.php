<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TerminationController extends Controller
{

    public function termination_index()
    {
        return view(' terminations.termination');
    }

}
