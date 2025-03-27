<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class SauceControllerAPI extends Controller
{
    // Obtenir toutes les sauces
    public function index()
    {
        return response()->json(Sauce::all(), 200);
    }

    // Obtenir une sauce spécifique
    public function show($id)
    {
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return response()->json(['message' => 'Sauce non trouvée'], 404);
        }

        return response()->json($sauce, 200);
    }

    // Ajouter une sauce
    public function store(Request $request)
    {
        $sauce = Sauce::create($request->all());
        return response()->json($sauce, 201);
    }

    // Mettre à jour une sauce
    public function update(Request $request, $id)
    {
        $sauce = Sauce::find($id);
        
        if (!$sauce) {
            return response()->json(['message' => 'Sauce non trouvée'], 404);
        }

        $sauce->update($request->all());
        return response()->json($sauce, 200);
    }

    // Supprimer une sauce
    public function destroy($id)
    {
        $sauce = Sauce::find($id);
        
        if (!$sauce) {
            return response()->json(['message' => 'Sauce non trouvée'], 404);
        }

        $sauce->delete();
        return response()->json(['message' => 'Sauce supprimée'], 200);
    }
}
