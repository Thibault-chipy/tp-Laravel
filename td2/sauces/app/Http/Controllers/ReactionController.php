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
        if ($existingReaction->reaction === $reaction) {
            // Si la réaction est la même, on la supprime
            $existingReaction->delete();
            $message = 'Réaction supprimée.';
        } else {
            // Sinon, on met à jour la réaction
            $existingReaction->update(['reaction' => $reaction]);
            $message = 'Réaction mise à jour.';
        }
    } else {
        // Création d'une nouvelle réaction
        SauceReact::create([
            'idUser' => $user->idUser,
            'sauceId' => $sauce->idSauce,
            'reaction' => $reaction,
        ]);
        $message = 'Réaction ajoutée.';
    }

    // Mise à jour des compteurs de likes/dislikes
    $this->updateReactionCounts($sauce);

    return redirect()->route("sauces.show", $sauce_id)->with('success', $message);
}

/**
 * Met à jour le nombre de likes/dislikes dans la table Sauce.
 */
private function updateReactionCounts(Sauce $sauce)
{
    $sauce->likes = SauceReact::where('sauceId', $sauce->idSauce)->where('reaction', 'like')->count();
    $sauce->dislikes = SauceReact::where('sauceId', $sauce->idSauce)->where('reaction', 'dislike')->count();
    $sauce->save();
}


}
