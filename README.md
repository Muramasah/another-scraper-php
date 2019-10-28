[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/Muramasah/another-scraper-php/blob/master/LICENSE)

This is service which allow us to interact with a scraper and a crawler using HTTP. The basic idea is to be able to convert every source in the internet into a consumable JSON.

# Table of Contents

1. [Installation](#installation)
2. [Features](#features) 
3. [Usage](#usage)


# Installation
You need a SQL server running, edit [src/Server/Database.php](https://github.com/Muramasah/another-scraper-php/blob/master/src/Server/Database.php) to add your configuration.

With [Composer](https://getcomposer.org/):

```bash
git clone https://github.com/Muramasah/another-scraper-php.git

cd another-scraper-php

composer install

```

# Features
## Crawler
The crawler has not real crawling features yet, but encapsulates the logic which handles the http request and the source model creation. There is no access to the crawler configuration though the API yet.

## Engines
Actualy we only have a DOM engine, which works using css selectors to pick data from an html.

## Extractors
The extractor tells to the engine how we will extract something, and what name we want for this data. So, a extractor is a configuration string to extract or scrap a named data. 

# Usage

After the installation we need to run a php server like

```bash
php -S localhost:8000
```

which wil be able to respond to:

## POST
##  /scrap
### source
Url to the source which will be scraped.

### engine
These are the processors which allow us to configurate how the data will be extracted. Actually there is only one, the DOM [engine](#Engines).

### extractors
JSON with the configuration to scrap individualized data with titles/keys.

### Example
Body from a post request to http://localhost:8000/scrap
```json
{
  "source": "https://www.imdb.com/title/tt1560220",
  "extractors": {
    "title":".originalTitle::text",
    "description":".summary_text"
    }
}
```

Expected response:
```json
{
    "title": "Zombieland: Double Tap",
    "description": "Columbus, Tallahassee, Wichita, and Little Rock move to the American heartland as they face off against evolved zombies, fellow survivors, and the growing pains of the snarky makeshift family."
}
```