<?php

/**
 * Runs the Scraper API server
 * php version 7.3.10
 * 
 * @category Core
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

new Another\Server\Api();
