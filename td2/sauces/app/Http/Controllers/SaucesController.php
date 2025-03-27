<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Models\SauceReact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class SaucesController extends Controller
{
    public function index(){
        $sauces = Sauce::all();
        return view('sauces.index',["sauces" =>$sauces]);
    }

    public function show($id){
        $sauce = Sauce::find($id);
        
        //Verifier les réactions de l'utilisateur connecté
        if(Auth::check()){
            $userId = Auth::id();
            $sauceReact = SauceReact::where('sauceId', $id)->where('idUser', $userId)->first();
            if($sauceReact){
                $reaction = $sauceReact->reaction;
            }else{
                $reaction = null;
            }
        }else{
            $reaction = null;
        }

        return view("sauces.show",['sauce'=>$sauce,"likes" => SauceReact::where('sauceId', $id)->where('reaction', 'like')->count(), "dislikes" => SauceReact::where('sauceId', $id)->where('reaction', 'dislike')->count(), "reaction" => $reaction]);
    }

    public function create(){
        return view("sauces.create");
    }

    public function store(Request $request) {
             if ($request->file('image')) {
            $path = $request->file('image')->store('sauces', 'public');
            $imageUrl = 'storage/' . $path;
        } else {
            $imageUrl = 'storage/sauces/default.jpg';
        }
        $sauce = new Sauce();
        $sauce->name = $request->name;
        $sauce->manufacturer = $request->manufacturer;
        $sauce->description = $request->description;
        $sauce->mainPepper = $request->piment;
        $sauce->heat = $request->heat;
        $sauce->imageUrl = $imageUrl;
        $sauce->user_Id = $request->userId;

        $sauce->save();

        return redirect()->route('sauces.index')->with('success', 'Sauce ajoutée avec succès');
    }

    public function destroy($id){
        $sauce = Sauce::find($id);
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour supprimer la sauce.');
        }
        if(Auth::id()!==$sauce->user_id){
            return redirect()->route("sauces.show",$id)->with("error","Vous ne pouvez pas supprimer la sauce, elle ne vous appartient pas");
        }

        $imgPath = str_replace('storage/', '', $sauce->imageUrl);
        Storage::Disk("public")->delete($imgPath);        
        $sauce->delete();

        return redirect()->route("sauces.index")->with("success","Sauce supprimé avec succès");
    }

public function edit($id){
    $sauce = Sauce::find($id);
    if(!Auth::check()){
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour modifier la sauce.');
    }
    if(Auth::id()!==$sauce->user_id){
        return redirect()->route("sauces.show", $id)->with("error", "Vous ne pouvez pas modifier la sauce, elle ne vous appartient pas");
    }

    return view("sauces.update", ['sauce' => $sauce]);
}

public function update(Request $request, $id){
    $sauce = Sauce::find($id);
    if(!Auth::check()){
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour modifier la sauce.');
    }
    if(Auth::id()!==$sauce->user_id){
        return redirect()->route("sauces.show", $id)->with("error", "Vous ne pouvez pas modifier la sauce, elle ne vous appartient pas");
    }

    if ($request->file('image')) {
        // Delete old image if it's not the default
        if ($sauce->imageUrl != 'storage/sauces/default.jpg') {
            $oldImgPath = str_replace('storage/', '', $sauce->imageUrl);
            Storage::disk('public')->delete($oldImgPath);
        }
        
        // Store new image
        $path = $request->file('image')->store('sauces', 'public');
        $sauce->imageUrl = 'storage/' . $path;
    }

    $sauce->name = $request->name;
    $sauce->manufacturer = $request->manufacturer;
    $sauce->description = $request->description;
    $sauce->mainPepper = $request->piment;
    $sauce->heat = $request->heat;
    $sauce->user_Id = $request->userId;

    $sauce->save();

    return redirect()->route("sauces.show", $id)->with("success", "Sauce modifiée avec succès");
}

public function reaction(Request $request){
    $sauceId = $request->sauceId;
    $userId = Auth::id();
    $reaction = $request->reaction;

    $sauceReact = SauceReact::where('sauceId', $sauceId)->where('userId', $userId)->first();

    if ($sauceReact) {
        $sauceReact->reaction = $reaction;
        $sauceReact->save();
    } else {
        $sauceReact = new SauceReact();
        $sauceReact->sauceId = $sauceId;
        $sauceReact->userId = $userId;
        $sauceReact->reaction = $reaction;
        $sauceReact->save();
    }

    return redirect()->route('sauces.index');
}


}
