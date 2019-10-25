<?php

/**
 * Crawler
 * php version 7.3.10
 * 
 * @category Crawler
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Crawler;

use Another\Models\Source;
use GuzzleHttp\Client;

/**
 * Handles server requests and transform them into Source models
 * php version 7.3.10
 * 
 * @category Server
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */
class Crawler
{
    private $_httpClient;
    /**
     * Initialize the objects to be used with internal references.
     */
    public function __construct()
    {
        $this->_httpClient = new Client();
    }
    /**
     * Get the source model from a url, if the model is not present in the
     * databe, will request the data and create the model before return it.
     * 
     * @param string $url Source origine.
     * 
     * @return Source Model.
     */
    public function getSourceModelFromUrl($url)
    {
        $sourceModel = Source::where('url', $url)->first();

        if (!$sourceModel) {
            $sourceModel = $this->_createSourceFromUrl($url);
        }

        return $sourceModel;
    }
    /**
     * Creates a new source model by requesting the data from the url specified
     * and save it in the database.
     * 
     * @param string $url Source origine.
     * 
     * @return Source Model.
     */
    private function _createSourceFromUrl($url)
    {
        $sourceModel = new Source();
        $file = $this->_getFileFromUrl($url);

        $sourceModel->url = $url;
        $sourceModel->file = $file;
        $sourceModel->save();

        return $sourceModel;
    }
    /**
     * Requests the data from the url specified.
     * 
     * @param string $url Source origine.
     * 
     * @return string Source file.
     */
    private function _getFileFromUrl($url)
    {
        $request = $this->_httpClient->request('GET', $url);
        $file = $request->getBody()->getContents();

        return $file;
    }
}
