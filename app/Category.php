<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $guarded = [];

  // One to Many - Articles
  public function articles()
  {
    return $this->hasMany(Article::class);
  }
}
