<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recette extends Model {

    use Searchable;
    use Rateable;

    protected $guarded = [];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function rating() {
      return $this->hasMany(Rating::class);
    }

}
