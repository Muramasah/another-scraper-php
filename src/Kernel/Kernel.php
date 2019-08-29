<?php

namespace Another\Kernel;

use Another\Displayer\Displayer;
use Another\Engines\DomEngine;
use Another\Scraper\Scraper;
use Another\Source\Imdb;

abstract class Kernel
{
  static public function initScraper()
  {// Extractor
    $movieDataDomExtractors = [
      'name' => function ($domElements) {
        $name = $domElements->find('.originalTitle::text');

        return $name;
      },
      'release' => function ($domElements) {
        return $domElements->find('.summary_text::text');
      },
      'rating' => function ($domElements) {
        return $domElements->first('.ratingValue')->text();
      }
    ];
    // Kernel
    $sourceClient = new Imdb();
    $engine = new DomEngine();
    $domScraper = new Scraper($engine, $movieDataDomExtractors, $sourceClient->getRawFile());

    Displayer::displayInConsole($domScraper->scrapLoadedHtml());
  }
}
