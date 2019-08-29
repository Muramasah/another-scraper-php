<?php

namespace Another\Model\Schema;

use \Illuminate\Database\Capsule\Manager as Capsule;

function createHtmlSourceTable()
{
  return Capsule::schema()->create(
    'source',
    function ($table) {
      $table->increments('id');
      $table->foreign('url_id')->references('id')->on('customers');
      $table->string('rawFile');
    }
  );
}
