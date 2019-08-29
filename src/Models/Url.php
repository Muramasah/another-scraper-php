<?php

namespace Another\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
  protected $fillable = ['baseUrl', 'url', 'raw_file_id'];
  protected $with = ['rawFile'];

  public function url()
  {
    return $this->belongsTo('\Another\Models\url');
  }
}
