<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use App\Recette;
use Illuminate\Http\Request;

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // public function __construct() {
     //    $this->middleware('auth');
     // }

     public function recetteStar (Request $request, Recette $recette) {
      $rating = new Rating;
      $rating->user_id = auth()->user()->id;
      $rating->rating = $request->input('star');
      $recette->ratings()->save($rating);
      return redirect()->back();
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //VALIDE LES ATTRIBUTS RENTRES LORS DE LA CREATION DE LA RECETTE
        //ICI, TOUS LES ATTRIBUTS DE LA RECETTE SON RECQUIS POUR CREER LA RECETTE
        $data = request()->validate([
          'name' => 'required',
          'description' => 'required',
          'ingredient' => 'required',
          'instruction' => 'required',
          'image' => ['required', 'image'],
        ]);

        //$imagePath DIRIGE LA REQUETE DE DATA DE L'IMAGE VERS LE DOSSIER ADEQUAT
        $imagePath = request('image')->store('uploads', 'public');

        //STORE LES ATTRIBUTS DE LA RECETTE DANS UN ARRAY AVEC LA METHODE create()
        auth()->user()->recettes()->create([
          'name' => $data['name'],
          'description' => $data['description'],
          'ingredient' => $data['ingredient'],
          'instruction' => $data['instruction'],
          'image' => $imagePath,
        ]);

        //REDIRIGE SUR LE PROFIL DE L'UTILISATEUR APRES LA CREATION DE LA RECETTE
        return redirect('/profile/' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        return view('recettes/show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */




    public function edit(Request $request, Recette $recette)
    {
      $this->authorize('update', $recette);

      return view('recettes/edit', compact('recette'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recette $recette)
    {
      // EN LIEN AVEC LES POLICIES, PERMET AU USER D'UPDATE SA RECETTE SEULEMENT
      // SI IL EN EST LE CREATEUR
       $this->authorize('update', $recette);

       // LES ATTRIBUTS SUIVANT SONT REQUIRED AFIN D'UPDATE LA RECETTE
       $data = request()->validate([
         'name' => 'required',
         'description' => 'required',
         'ingredient' => 'required',
         'instruction' => 'required',
         // 'image' => ['required', 'image'],
       ]);

       // LA RECETTE EST SAUVEGARDE - OU PLUTOT UPDATED
       $recette->update($data);

       // LE CONTROLLER REDIRIGE L'UTILISATEUR A LA RECETTE UPDATED
       return redirect('/recipe/' . $recette->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recette $recette)
    {
      //DETRUIT LA RECETTE AVEC LA METHODE delete()
      $recette->delete();

      return redirect('/profile/' . auth()->user()->id);
    }


}
