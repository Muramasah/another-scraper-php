<?php

namespace Another\Engines;

use DiDom\Document;
use Another\Engines\AbstractEngine;

class DomEngine extends AbstractEngine
{
  public function extractData(string $html, $dataExtractors)
  {
    $domElements = new Document($html);
    $extractedData = [];

    foreach ($dataExtractors as $name => $extractor) {
      $extractedData[$name] = $extractor($domElements);
    }

    return $extractedData;
  }
}
