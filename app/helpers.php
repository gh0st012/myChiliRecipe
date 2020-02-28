<?php

function randomRecipe() {

  $recette = App\Recette::inRandomOrder()->first();

}
