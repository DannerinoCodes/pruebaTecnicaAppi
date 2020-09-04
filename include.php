<?php

// First files to load: libs - because inside of them exist files with dependencies related to libs functions
// RecursiveDirectoryIterator class gives an interface to iterate recursively every directory in the file system

$Directory = new RecursiveDirectoryIterator(dirname(__FILE__) . '/libs/');

// RecursiveIteratorIterator can be used to go through recursive iterators
$Iterator = new RecursiveIteratorIterator($Directory);

// RegexIterator class can be used to filter another iterator based in a RegEx
// RecursiveRegexIterator::GET_MATCH returns every coincidence
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

// $Regex object can be looped through as an array which elements are the complete file's paths. Indexes are the full paths as well.s
foreach ($Regex as $key => $item)
    require_once $key;
$Directory = new RecursiveDirectoryIterator(dirname(__FILE__));
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
foreach ($Regex as $key => $item)
    if (!contains('index', $key) && !contains('include', $key) && !contains('vista', $key))
        require_once $key;
