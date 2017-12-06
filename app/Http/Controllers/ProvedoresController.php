<?php

namespace App\Http\Controllers;

use App\Provedor;
use App\Http\Controllers\Controller;

class ProvedoresController extends Controller{

   public function index(){

	return view('Provedores.index');
		
		}

	
}