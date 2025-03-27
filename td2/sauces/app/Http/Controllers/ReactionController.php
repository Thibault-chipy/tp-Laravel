<?php
namespace App\Http\Controllers;

use App\Models\SauceReact;
use App\Models\User;
use App\Models\Sauce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function react(int $sauce_id, string $reaction)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour réagir.');
        }

        $user = Auth::user();
        $sauce = Sauce::findOrFail($sauce_id);

        // Vérifie si l'utilisateur a déjà réagi à cette sauce
        $existingReaction = SauceReact::where('idUser', $user->idUser)
                                    ->where('sauceId', $sauce_id)
                                    ->first();

        if ($existingReaction) {
            // Si la réaction existe et que c'est la même, on supprime la réaction et rajoute la nouvelle
            if ($existingReaction->reaction === $reaction) {
                $existingReaction->delete();
                return redirect()->route("sauces.show",$sauce_id)->with('success', 'Réaction supprimée.');
            } 

            // Sinon, on met à jour la réaction 
            $existingReaction->reaction = $reaction;
            SauceReact::where('idUser', $user->idUser)
                ->where('sauceId', $sauce_id)
                ->update(['reaction' => $reaction]);
            return redirect()->route("sauces.show",$sauce_id)->with('message', 'Réaction mise à jour');

            // Création d'une nouvelle réaction
            SauceReact::create([
                'idUser' => $user->idUser,
                'sauceId' => $sauce->idSauce,
                'reaction' => $reaction,
            ]);

            return redirect()->route("sauces.show",$sauce_id)->with('success', 'Réaction ajoutée.');
        }
    }
}
