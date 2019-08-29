<?php

namespace Another\Engines;

abstract class AbstractEngine
{
  abstract protected function extractData(string $html, $extractors);
  private $extractors;
  public function start($extractors)
  {
    $this->extractors = $extractors;

    return function ($html) {
      return $this->extractData($html, $this->extractors);
    };
  }
}
