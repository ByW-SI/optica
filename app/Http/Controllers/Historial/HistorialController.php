<?php

namespace App\Http\Controllers\Historial;

use App\Historial;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::get();
        $productos = Producto::get();
        return view('historial.index', ['historiales' => $historiales, 'productos' => $productos]);
    }

}
