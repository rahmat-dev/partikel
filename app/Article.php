<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $guarded = [];

  // Many to One - User
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Many to One - Category
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
