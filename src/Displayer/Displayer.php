<?php

namespace Another\Displayer;

abstract class Displayer
{
  static public function displayInConsole($stuff)
  {
    $type = gettype($stuff);

    if ($type !== 'string') {
      print_r($stuff);
      return;
    }

    echo $stuff, '\n';
  }
}
