<?php

/**
 * Database
 * php version 7.3.10
 * 
 * @category Server
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Server;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;

/**
 * Handles server and app initialization. Layer to encapsulate library used to
 * handle the database.
 * php version 7.3.10
 * 
 * @category Server
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */
class Database
{
    private $_handler;
    /**
     * Connects to database
     * 
     * @return void
     */
    public function connect()
    {
        $manager = new Manager;

        $manager->addConnection(
            [
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'anoter_scraper',
                'username'  => 'root',
                'password'  => ',mur4masA.',
                'charset'   => 'utf8',
                'collation' => 'utf8_general_ci',
                'prefix'    => ''
            ]
        );
        $manager->setEventDispatcher(new Dispatcher(new Container));
        // Make this Capsule instance available globally via static methods...
        // (optional)
        $manager->setAsGlobal();
        // Setup the Eloquent ORM... (optional; unless you've used
        // setEventDispatcher())
        $manager->bootEloquent();

        $this->_handler = $manager;
    }
}
