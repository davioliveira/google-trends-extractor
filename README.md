google-trends-extractor
=======================

A simple trend extractor from Google Trends in PHP

Usage
-----

Extract trends in array

    $gtrend = new GTrendExtractor('http://www.google.com/trends/hottrends/atom/hourly');
    $trend = $gtrend->get();
    print_r($trend);

Extract trends in json

    $gtrend = new GTrendExtractor('http://www.google.com/trends/hottrends/atom/hourly');
    $trend = $gtrend->get('json');
    echo $trend;
