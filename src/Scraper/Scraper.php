<?php

/**
 * Scraper
 * php version 7.3.10
 * 
 * @category Scraper
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Scraper;

use Another\Engines\ScraperEngine;
use Another\Models\Source;

/**
 * Handles the interaction between the different abstractions made to handle
 * the scraping process.
 * php version 7.3.10
 * 
 * @category Scraper
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */
class Scraper
{
    private $_engine, $_extractors, $_source;
    /**
     * Loads the objects to be used to handle the scraping process into private
     * properties.
     * 
     * @param ScraperEngine|null $engine     Engine class which will handle
     *                                       the how the scraping is done.
     * @param Source|null        $source     Model with the direction and
     *                                       content of an url.
     * @param array|null         $extractors Array of extractors for a
     *                                       specific data, each key will be a
     *                                       key on the json response.
     */
    public function __construct(
        ScraperEngine $engine = null,
        Source $source = null,
        array $extractors = null
    ) {
        if ($extractors) {
            $this->loadExtractors($extractors);
        }

        if ($engine) {
            $this->loadEngine($engine);
        }

        if ($source) {
            $this->loadSource($source);
        }
    }
    /**
     * Uses the engine to scrap the source as is specified in the extractors.
     * 
     * @return array Data extracted from the source.
     */
    public function scrapLoadedSource()
    {
        return $this->_engine->extractData($this->_source, $this->_extractors);
    }
    /**
     * Loads the scraper engine.
     * 
     * @param ScraperEngine $engine Engine class which will handle the how
     *                              the scraping is done.
     * 
     * @return Scraper              Returns the scraper instance, allowing to
     *                              call methods in chain.
     */
    public function loadEngine(ScraperEngine $engine)
    {
        $this->_engine = new $engine();

        return $this;
    }
    /**
     * Loads the scraper extractors.
     * 
     * @param array $extractors Array of extractors for a specific data, each
     *                          key will be a key on the json response.
     * 
     * @return Scraper          Returns the scraper instance, allowing to call
     *                          methods in chain.
     */
    public function loadExtractors(array $extractors)
    {
        $this->_extractors = $extractors;

        return $this;
    }
    /**
     * Loads the scraper extractors.
     * 
     * @param Source $source Model with the direction and content of an url.
     * 
     * @return Scraper       Returns the scraper instance, allowing to call
     *                       methods in chain.
     */
    public function loadSource(Source $source)
    {
        $this->_source = $source;

        return $this;
    }
}
