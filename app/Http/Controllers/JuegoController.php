<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Juego;
use App\Models\Plataforma;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PlataformaController;
use DateTime;
use Illuminate\Support\Str;

class JuegoController extends Controller
{
    public function index()
    {
        // $categorias = (new CategoriaController())->index();
        $categorias = Categoria::all();
        $plataformas = Plataforma::all();

        $juegos = DB::table('juegos')
            ->join('categorias', 'juegos.id_categoria', '=', 'categorias.id_categoria')
            ->join('plataformas', 'juegos.id_plataforma', '=', 'plataformas.id_plataforma')
            ->select('juegos.*', 'categorias.id_categoria', 'plataformas.id_plataforma')
            ->get();

        return view('juego.index', ['juegos' => $juegos, 'categorias' => $categorias, 'plataformas' => $plataformas]);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $juegos = new Juego;
        $juegos->nombre_juego = $request->input('nombre_juego');
        $juegos->precio = $request->input('precio');
        $juegos->imagen_juego = $request->input('imagen_juego');
        $juegos->id_categoria = $request->input('id_categoria');
        $juegos->id_plataforma = $request->input('id_plataforma');


        if ($request->hasFile("imagen_juego")) {

            $imagen_juego = $request->file("imagen_juego");
            $nombreImagen = Str::slug($request->nombre_juego) . "." . $imagen_juego->guessExtension();
            $ruta = public_path("img/juegos/");
            $imagen_juego->move($ruta, $nombreImagen);

            $juegos->imagen_juego = $nombreImagen;
        }
        $juegos->save();

        // return view('home.index', compact('juegos'))->with('ok','ok');

        return redirect(route('home.index'))->with('ok','ok');
    }



    public function show(Juego $juego)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id)
    {
        $juegos =Juego::find($id);
        $juegos->nombre_juego = $request->input('nombre_juego');
        $juegos->precio = $request->input('precio');
        $juegos->imagen_juego = $request->input('imagen_juego');
        $juegos->id_categoria = $request->input('id_categoria');
        $juegos->id_plataforma = $request->input('id_plataforma');


        if ($request->hasFile("imagen_juego")) {

            $imagen_juego = $request->file("imagen_juego");
            $nombreImagen = Str::slug($request->nombre_juego) . "." . $imagen_juego->guessExtension();
            $ruta = public_path("img/juegos/");
            $imagen_juego->move($ruta, $nombreImagen);

            $juegos->imagen_juego = $nombreImagen;
        }
        $juegos->update();

        return redirect(route('home.index'))->with('ok','ok');
    }

    public function destroy($id)
    {
        $juegos =Juego::find($id);
        $juegos->delete();
        return redirect(route('home.index'))->with('ok','ok');
    }
}
