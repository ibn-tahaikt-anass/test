<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Theme;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageController extends Controller
{
    

    public function download($id)
    {
        $image = Image::find($id);

        if ($image) {
            $filepath = storage_path('app/' . $image->path);

            if (file_exists($filepath)) {
                return response()->download($filepath, $image->nom);
            }
        }

        return response()->json(['message' => 'Image not found'], 404);
    }

    public function edit($id)
    {
        // Récupérer l'image pour l'édition
        $image = Image::find($id);

        return view('edit_image', compact('image'));
        // Assurez-vous de créer une vue 'edit_image' pour l'édition de l'image
    }

    public function getImageData($imageId) {
        $image = Image::find($imageId);
    
        if (!$image) {
            return response()->json(['error' => 'Image not found'], 404);
        }
    
        // Get the image data from the model (adjust this based on your database schema)
        $imageData = $image->data; // Replace 'data' with the actual column name where image data is stored
    
        return response()->json(['imageData' => $imageData]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données de la requête pour la mise à jour de l'image

        $image = Image::find($id);

        if ($request->hasFile('image')) {
            // Gérer la mise à jour du fichier image
            $file = $request->file('image');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $thumbPath = public_path('user_images/thumb');

            // Supprimer l'ancienne image du stockage
            Storage::delete($image->path);

            // Enregistrer la nouvelle image
            $file->move($thumbPath, $image_name);
            $image->path = $image_name;
        }

        // Mise à jour des autres champs d'image, si nécessaire
        $image->save();

        return redirect()->back()->with('success', 'Image successfully updated.');
    }

    public function destroy($id)
    {
        $image = Image::find($id);

        if ($image) {
            // Supprimer l'image du stockage
            Storage::delete($image->path);
            
            // Supprimer l'enregistrement de l'image de la base de données
            $image->delete();

            return redirect()->back()->with('success', 'Image successfully deleted.');
        }

        return response()->json(['message' => 'Image not found'], 404);
    }

    public function createTheme(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Créer un nouveau thème avec les données de la requête
        $theme = Theme::create([
            'nom' => $request->nom,
        ]);

        // Retourner la réponse appropriée (par exemple, une redirection ou une réponse JSON)
        return response()->json(['message' => 'Nouveau thème créé avec succès', 'theme' => $theme], 201);
    }

    public function assignTheme($imageId, $themeId)
    {
        // Trouver l'image et le thème correspondants
        $image = Image::findOrFail($imageId);
        $theme = Theme::findOrFail($themeId);

        // Assigner le thème à l'image
        $image->theme()->associate($theme);
        $image->save();

        // Retourner la réponse appropriée (par exemple, une redirection ou une réponse JSON)
        return response()->json(['message' => 'Thème assigné avec succès à l\'image'], 200);
    }

    public function createNewImage($imageId)
    {
        // Trouver l'image existante dans la base de données ou le système de fichiers
        $image = Image::findOrFail($imageId);

        // Charger l'image existante avec Intervention Image
        $existingImage = InterventionImage::make($image->chemin);

        // Appliquer la transformation de redimensionnement (resize)
        $newImage = $existingImage->resize(800, 600);

        // Enregistrer la nouvelle image
        $newImagePath = 'chemin/vers/nouvelle/image.jpg';
        $newImage->save($newImagePath);

        // Créer un nouvel enregistrement d'image dans la base de données avec le chemin de la nouvelle image
        // Exemple : $newImageRecord = Image::create(['chemin' => $newImagePath]);

        // Retourner la réponse appropriée (par exemple, une redirection ou une réponse JSON)
        return response()->json(['message' => 'Nouvelle image créée avec succès'], 201);
    }

    public function store(Request $request)
{
    $image = $request->file('image');
    $image_name = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $image_name = rand(1000, 9999) . time() . '.' . $file->getClientOriginalExtension();
        $thumbPath = public_path('user_images/thumb');

        $file->move($thumbPath, $image_name);

        // Obtenez le chemin physique de l'image téléchargée
        $image_path = $thumbPath . '/' . $image_name; // C'est le chemin physique

        // Utilisez le modèle "Image" pour enregistrer les détails de l'image dans la base de données
        $imageRecord = Image::create([
            'user_id' => auth()->id(),
            'caption' => $request->caption,
            'category' => $request->category,
            'path' => $image_name,
            'chemin' => $image_path, // Enregistrez le chemin physique dans la base de données
        ]);

        return redirect()->back()->with('success', 'Image successfully uploaded.');
    }

    return response()->json(['message' => 'No image file provided'], 400);
}


public function index(Request $request)
{
    $themes = Theme::all();

    $selectedCategory = $request->query('category', 'all'); // Récupère la catégorie sélectionnée

    if ($selectedCategory !== 'all') {
        $images = Image::where('category', $selectedCategory)->get();
    } else {
        $images = Image::all();
    }

    return view('home', ['images' => $images, 'themes' => $themes, 'selectedCategory' => $selectedCategory]);
}     
 
    }