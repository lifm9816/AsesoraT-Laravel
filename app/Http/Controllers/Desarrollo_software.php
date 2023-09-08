<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Desarrollo_software extends Controller
{

    public function dsMain()
    {
        return view("Desarrollo_Software.dsMain");
    }

    public function Login2()
    {
        return view("Desarrollo_Software.Login2");
    }
}
