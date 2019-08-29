<?php

namespace Another\Scraper;

use Another\State\State;

class Scraper
{
  const ENGINE = 'engine';
  const EXTRACTORS = 'extractors';
  const HTML = 'html';

  private $state;

  public function __construct($engine, array $extractors = null, $html = null)
  {
    $this->state = new State();

    if ($extractors) {
      $this->loadExtractors($extractors);
    }

    if ($engine) {
      $this->loadEngine($engine);
    }

    if ($html) {
      $this->loadHtml($html);
    }
  }

  function scrapLoadedHtml()
  {
    return $this->scrap($this->state->get(self::HTML));
  }

  function scrap($html)
  {
    $extractors = $this->state->get(self::EXTRACTORS);
    $engine = $this->state->get(self::ENGINE);
    $extract = $engine->start($extractors);

    return $extract($html);
  }

  function loadEngine($engine)
  {
    $this->state->update([self::ENGINE => new $engine()]);

    return $this;
  }

  function loadExtractors($extractors)
  {
    $this->state->update([self::EXTRACTORS => $extractors]);

    return $this;
  }

  function loadHtml($html)
  {
    $this->state->update([self::HTML => $html]);

    return $this;
  }
}
