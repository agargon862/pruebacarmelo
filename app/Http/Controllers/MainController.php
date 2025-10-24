<?php

namespace App\Http\Controllers;

use App\Models\Peinado;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MainController extends Controller
{
   function main(): View {
    $peinados = Peinado::all();
    return view('main.main', ['peinados' => $peinados]);
}

function about(): View {
    $peinados = Peinado::all();
    return view('main.main', ['peinados' => $peinados]);
}

}
