<?php

namespace Another\Database;

use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

abstract class Database
{
  static public function connect()
  {
    $capsule = new Capsule;

    $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'anoter_scraper',
      'username'  => 'muramasa',
      'password'  => ',mur4masA.',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ]);

    $capsule->setEventDispatcher(new Dispatcher(new IlluminateContainer));

    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();

    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();
  }
}
