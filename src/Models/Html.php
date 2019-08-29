<?php

namespace Another\Models;

use Illuminate\Database\Eloquent\Model;

class Html extends Model
{
  protected $fillable = ['rawFile', 'url_id'];
  protected $with = ['url'];

  public function url()
  {
    return $this->belongsTo('\Another\Models\url');
  }
}
