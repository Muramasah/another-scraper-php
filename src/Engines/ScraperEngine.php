<?php

/**
 * Scraper Engine Interface
 * php version 7.3.10
 * 
 * @category Engine
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Engines;

/**
 * Engine contract.
 * php version 7.3.10
 * 
 * @category Scraper
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */
interface ScraperEngine
{
    /**
     * Iterates over the extractors to scrap the specified data from the source.
     * 
     * @param Source $source     Model with the direction and content of an url.
     * @param array  $extractors Array of extractors for a specific data, each 
     *                           key will be a key on the json response.
     * 
     * @return array             Data extracted from the source.
     */
    function extractData(Source $source, array $extractors);
}
