<?php

namespace App\Http\Controllers\Producto;

use App\Producto;
use App\Historial;
use App\Provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Provedor::get();
        return view('productos.create', ['proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch($request->seccion) {
            case 'ortopedia':
                $sku = 'ORTO' . $request->marca_abr . $request->producto_abr . $request->color_abr;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->talla . ' ' . $request->color;
                break;
            case 'micas':
                $sku = 'MICA' . $request->materiales_abr . $request->tratamiento_abr . $request->color_abr;
                $desc = $request->materiales . ' ' . $request->rangos . ' ' . $request->color . ' ' . $request->tratamiento . ' ' . $request->unidad;
                break;
            case 'armazones':
                $sku = 'ARMAZON' . $request->marca_abr . $request->modelo_abr . $request->medidas_abr;
                $desc = $request->marca . ' ' . $request->modelo . ' ' . $request->medidas . ' ' . $request->color;
                break;
            case 'generales':
                $sku = 'OPTICA' . $request->marca_abr . $request->producto_abr . $request->color_abr;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->color;
                break;
            default:
                break;
        }
        $sku = str_replace(' ', '', $sku);
        $request['sku_interno'] = $sku;
        $request['descripcion'] = $desc;
        $producto = Producto::create($request->all());
        $aux1 = $request->foto1 ? (Storage::putFileAs('productos/' . $request->seccion . '/' . $producto->id, $request->file('foto1'), 'foto1.jpg')) : null;
        $aux2 = $request->foto2 ? (Storage::putFileAs('productos/' . $request->seccion . '/' . $producto->id, $request->file('foto2'), 'foto2.jpg')) : null;
        $aux3 = $request->foto3 ? (Storage::putFileAs('productos/' . $request->seccion . '/' . $producto->id, $request->file('foto3'), 'foto3.jpg')) : null;
        $producto->foto1 = $aux1;
        $producto->foto2 = $aux2;
        $producto->foto3 = $aux3;
        $producto->save();
        $historial = new Historial(['tipo' => 'Alta de Producto', 'descripcion' => 'Producto registrado.']);
        $producto->historiales()->save($historial);
        return redirect()->route('productos.show', ['producto' => $producto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.view', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $proveedores = Provedor::get();
        return view('productos.edit', ['producto' => $producto, 'proveedores' => $proveedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        switch($producto->seccion) {
            case 'ortopedia':
                $sku = 'ORTO' . $request->marca_abr . $request->producto_abr . $request->color_abr;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->talla . ' ' . $request->color;
                break;
            case 'micas':
                $sku = 'MICA' . $request->materiales_abr . $request->tratamiento_abr . $request->color_abr;
                $desc = $request->materiales . ' ' . $request->rangos . ' ' . $request->color . ' ' . $request->tratamiento . ' ' . $request->unidad;
                break;
            case 'armazones':
                $sku = 'ARMAZON' . $request->marca_abr . $request->modelo_abr . $request->medidas_abr;
                $desc = $request->marca . ' ' . $request->modelo . ' ' . $request->medidas . ' ' . $request->color;
                break;
            case 'generales':
                $sku = 'OPTICA' . $request->marca_abr . $request->producto_abr . $request->color_abr;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->color;
                break;
            default:
                break;
        }
        $sku = str_replace(' ', '', $sku);
        $aux1 = $request->foto1 ? (Storage::putFileAs('productos/' . $producto->seccion . '/' . $producto->id, $request->file('foto1'), 'foto1.jpg')) : null;
        $aux2 = $request->foto2 ? (Storage::putFileAs('productos/' . $producto->seccion . '/' . $producto->id, $request->file('foto2'), 'foto2.jpg')) : null;
        $aux3 = $request->foto3 ? (Storage::putFileAs('productos/' . $producto->seccion . '/' . $producto->id, $request->file('foto3'), 'foto3.jpg')) : null;
        $request['sku_interno'] = $sku;
        $request['descripcion'] = $desc;
        $producto->update($request->all());
        $producto->foto1 = $aux1;
        $producto->foto2 = $aux2;
        $producto->foto3 = $aux3;
        $producto->save();
        $historial = new Historial(['tipo' => 'Modificación de Producto', 'descripcion' => 'Producto modificado.']);
        $producto->historiales()->save($historial);
        return redirect()->route('productos.show', ['producto' => $producto]);
    }

    public function buscar(Request $request) {
        $query = $request->input('query');
        $seccion = $request->input('seccion');
        $wordsquery = explode(' ', $query);
        $productos = Producto::where(function($q) use($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('sku_interno', 'LIKE', "%$word%")
                  ->orWhere('descripcion', 'LIKE', "%$word%");
            }
        });
        if($seccion != '')
            $productos = $productos->where('seccion', $seccion);
        $productos = $productos->get();
        return view('productos.busqueda', ['productos' => $productos]);
    }

}