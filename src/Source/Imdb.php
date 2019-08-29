<?php

namespace Another\Source;

use GuzzleHttp\Client;
use Another\Database\Database;

class Imdb
{
  private $baseUrl, $httpClient, $rawFile, $splittedFile;

  public function __construct($baseUrl = 'http://www.imdb.com/')
  {
    $this->setBaseUrl($baseUrl);
    $this->httpClient = new Client(['base_uri' => $this->getBaseUrl()]);

    Database::connect();
    $this->requestRawData();
  }
  public function createUrl($section, $parameters)
  {
    return strtr($this->getUrlTemplates()[$section], $parameters);
  }

  private function requestRawData()
  {
    $response = $this->httpClient->request('GET', $this->createUrl('title', [
      '$id' => 'tt1229340'
    ]));

    $this->setRawFile($response->getBody());

    return $this;
  }

  public function getUrlTemplates()
  {
    return ['title' => $this->getBaseUrl() . 'title/$id/'];
  }

  public function getBaseUrl()
  {
    return $this->baseUrl;
  }
  public function getRawFile()
  {
    return $this->rawFile;
  }
  public function setBaseUrl($baseUrl)
  {
    $this->baseUrl = $baseUrl;
    return $this;
  }
  public function setRawFile($html)
  {
    $this->rawFile = $html;
  }
  public function setSplittedFile(array $sections)
  {
    $this->splittedFile = $sections;
  }
}
