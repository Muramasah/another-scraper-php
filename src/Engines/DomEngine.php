<?php

/**
 * DomEngine
 * php version 7.3.10
 * 
 * @category Engine
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Engines;

use Another\Models\Source;
use DiDom\Document;

/**
 * Uses extractors based in css selectors to scrap data from the source.
 * php version 7.3.10
 * 
 * @category Engine
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 * @see      https://github.com/Imangazaliev/DiDOM
 */
class DomEngine implements ScraperEngine
{
    /**
     * Iterates over the extractors to scrap the specified data from the source.
     * 
     * @param Source $source     Model with the direction and content of an
     *                           url.
     * @param array  $extractors Array of string with selectors for a specific
     *                           data, each key will be a key on the json
     *                           response.
     * 
     * @return array             Data extracted from the source.
     * 
     * @see https://github.com/Imangazaliev/DiDOM
     */
    public function extractData(Source $source, array $extractors)
    {
        $domElements = new Document($source->file);
        $extractedData = [];

        foreach ($extractors as $name => $selector) {
            if (strpos($selector, '::text')) {
                $extractedData[$name] = $domElements->find($selector)[0];
            } else {
                $extractedData[$name] = $domElements->first($selector)->text();
            }
        }

        return $extractedData;
    }
}
