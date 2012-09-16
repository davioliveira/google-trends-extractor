<?php

require_once __DIR__ . '/GTrendExtractor.php';

$gtrend = new GTrendExtractor('http://www.google.com/trends/hottrends/atom/hourly');

// in array
$trend = $gtrend->get();
print_r($trend);

// in json
$trend = $gtrend->get('json');
echo $trend;
