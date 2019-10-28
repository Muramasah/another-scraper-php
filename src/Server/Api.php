<?php

/**
 * Api
 * php version 7.3.10
 * 
 * @category Server
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Server;

use Another\Crawler\Crawler;
use Another\Server\Database;
use Another\Engines\DomEngine;
use Another\Scraper\Scraper;
use Klein\Klein;

/**
 * Handles server and app initialization. Interface to handle the scraper and
 * crawler using http requests and responses.
 * php version 7.3.10
 * 
 * @category Core
 * @package  Another
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */
class Api
{
    private $_database, $_router;
    /**
     * Initialize the objects to be used with internal references.
     * Executes the server initialization so this is done just when the class is
     * instanciated.
     */
    public function __construct()
    {
        $this->_database = new Database;
        $this->_router = new Klein();

        $this->_initializeServer();
    }
    /**
     * Initializes the objects to be used by the controllers outside of these, so
     * every controller uses the same object instance.
     * Connects to database.
     * Stars the listeners for http requests.
     * 
     * @return void
     */
    private function _initializeServer()
    {
        $crawler = new Crawler;
        $htmlScraper = new Scraper(new DomEngine);

        $this->_database->connect();
        $this->_router->respond(
            'POST',
            '/src/index.php/scrap',
            function ($request, $response) use ($crawler, $htmlScraper) {
                $source = $crawler->getSourceModelFromUrl($request->param('source'));
                $extractors = json_decode($request->param('extractors'), true);

                $htmlScraper->loadExtractors($extractors);
                $htmlScraper->loadSource($source);
                $response->json($htmlScraper->scrapLoadedSource());
            }
        );
        $this->_router->dispatch();
    }
}
