[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE)

This is service which allow us to interact with a scraper and a crawler using HTTP. The basic idea is to be able to convert every source in the internet into a consumable JSON.

# Table of Contents

1. [Features](#features) 
2. [Usage](#usage)

# Features
## Crawler
The crawler has not real crawling features yet, but encapsulates the logic which handles the http request and the source model creation. There is no access to the crawler configuration though the API yet.

## Engines
Actualy we only have a DOM engine, which works using css selectors to pick data from an html.

# Usage

After the installation we need to run a php server, which wil be able to respond to:

## POST
##  /Scrap
### source
Url to the source which will be scraped.

### engine
These are the processors which allow us to configurate how the data will be extracted. Actually there is only one, the DOM [engine](#Engines).

### extractors
JSON array with the configuration to scrap individualized data with titles/keys.