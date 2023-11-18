<?php

namespace App\Http\Controllers;
use App\Models\Theme;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index(Request $request)
{
    $query = Theme::where('user_id', auth()->id());

    if ($request->category) {
        $query->where('category', $request->category);
    }

    if ($request->sort_by) {
        $order = ($request->sort_by == 'oldest') ? 'ASC' : 'DESC';
        $query->orderBy('created_at', $order);
    } else {
        $query->orderBy('created_at', 'DESC');
    }

   // $data['images'] = $query->paginate(10);

    return view('home', compact('data'));
}*/
public function index(Request $request)
{
    $query=Theme::where('user_id',auth()->id());
        if($request->category){
            $query->where('category',$request->category);

        }
    $themes = Theme::pluck('nom_theme', 'id'); // Récupérer uniquement les noms de thèmes depuis la base de données
    $selectedCategory = $request->query('category', 'all'); // Récupérer la catégorie sélectionnée

    if ($selectedCategory !== 'all') {
        $images = Image::where('category', $selectedCategory)->get(); // Récupérer les images basées sur la catégorie
    } else {
        $images = Image::all(); // Récupérer toutes les images si la catégorie est "all"
    }

    return view('home', ['images' => $images, 'themes' => $themes, 'selectedCategory' => $selectedCategory]);
}

}
