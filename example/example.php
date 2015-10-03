<?php

// Set timezone for example
date_default_timezone_set('Europe/Amsterdam');

// Require dependencies
require __DIR__ . '/../vendor/autoload.php';

// Initialize library
$jotihunt = new \StephanGroen\Jotihunt\Jotihunt(new \StephanGroen\Jotihunt\Connection());

// Find all foxes
$foxes = $jotihunt->fox()->all();
foreach ($foxes as $fox) {
    echo sprintf('Fox team %s has status %s', $fox->team, $fox->status) . "\n";
}

// Find all news
$news = $jotihunt->news()->all();
foreach ($news as $item) {
    echo sprintf('Newsitem: %s on date %s', $item->titel, date('d-m-Y', $item->datum)) . "\n";
}

// Find single news item
$itemId = $news[0]->ID;
$newsItem = $jotihunt->news()->find($itemId);

var_dump($newsItem->inhoud);