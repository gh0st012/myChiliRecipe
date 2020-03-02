<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model {

    use Rateable;

    protected $guarded = [];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function rating() {
      return $this->hasMany(Rating::class);
    }

}
