<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
  

    public function store(Request $request)
    {
        $request->validate([
            'nom_theme' => 'required|string',
        ]);
    
        $theme = Theme::create([
            'nom_theme' => $request->input('nom_theme'),
        ]);
    
        session()->flash('createdTheme', $theme->nom_theme);

        return redirect('/home')->with('success', 'Le thème a été créé avec succès.');
    }

    public function create()
    {
        return view('themes.create');
    }
    public function index()
    {
        $themes = Theme::all();
        return
         view('themes.index', compact('themes'));
    }
    public function update(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);

        // Valider les données du formulaire de mise à jour
        $request->validate([
            'nom_theme' => 'required|string',
        ]);

        // Mettre à jour le thème avec les données du formulaire
        $theme->update([
            'nom_theme' => $request->input('nom_theme'),
        ]);

        return redirect()->route('home')->with('success', 'Le thème a été mis à jour avec succès.');
    }
    public function edit($id)
    {
        $theme = Theme::findOrFail($id);

        return view('themes.edit', compact('theme'));
    }
    public function delete($id)
    {
        $theme = Theme::findOrFail($id);

        // Supprimer le thème
        $theme->delete();

        return redirect()->route('home')->with('success', 'Le thème a été supprimé avec succès.');
    }
}