<?php

namespace App\Http\Controllers;

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

        $data = request()->validate([
          'name' => 'required',
          'description' => 'required',
          'ingredient' => 'required',
          'instruction' => 'required',
          'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->recettes()->create([
          'name' => $data['name'],
          'description' => $data['description'],
          'ingredient' => $data['ingredient'],
          'instruction' => $data['instruction'],
          'image' => $imagePath,
        ]);

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
       $this->authorize('update', $recette);

       $data = request()->validate([
         'name' => 'required',
         'description' => 'required',
         'ingredient' => 'required',
         'instruction' => 'required',
         // 'image' => ['required', 'image'],
       ]);


       $recette->update($data);

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
      $recette->delete();

      return redirect('/profile/' . auth()->user()->id);
    }
}
