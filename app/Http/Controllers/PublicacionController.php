<?php

namespace App\Http\Controllers;

use App\Models\Publi;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index()
    {
        $publis = Publi::latest()->get();

        return view('layauts.index')->with(compact('publis'));
    }

    public function create()
    {
        return view('publicaciones.publicaciones');
    }

    public function poste(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'desc' => 'required|max:255',
            'date' => 'required|date',
        ]);

        $publi = new Publi();
        $publi->title = $attributes['title'];
        $publi->desc = $attributes['desc'];
        $publi->date = $attributes['date'];
        $publi->save();

        return redirect()
            ->route('publi.index')
            ->with('success', 'Publicación hecha correctamente.');
    }
}
