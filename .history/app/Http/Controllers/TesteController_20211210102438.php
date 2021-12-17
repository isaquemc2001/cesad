<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste()
    {
        $p1 = 10;
        $p2 = 20;
        $result = $p1 + $p2;
        //return view('site.teste', ['result' => $result]);

        //return view('site.teste', compact('result'));

        return view('site.teste')->with('result', $result);
    }
}
