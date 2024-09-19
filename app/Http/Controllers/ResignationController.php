<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ResignationController extends Controller
{

    public function resign_index()
    {
        return view('resignations.resignation');
    }

}
