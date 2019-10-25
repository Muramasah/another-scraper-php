<?php

/**
 * Source Model
 * php version 7.3.10
 * 
 * @category Model
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */

namespace Another\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Handles the relation between an url and its content.
 * php version 7.3.10
 * 
 * @category Model
 * @package  AnotherScraper
 * @author   Felipe <medina.xavier.felipe@gmail.com>
 * @license  https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE MIT
 * @link     https://github.com/Muramasah/another-scraper-php/
 */
class Source extends Model
{
    protected $fillable = ['children', 'url', 'file'];
}
