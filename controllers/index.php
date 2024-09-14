<?php
$heading = "Home";

$books = [
    [
        "name" => 'Title1',
        "author" => "Philip K.sad",
        "releaseYear" => 1968,
        "purchaseUrl" => 'http://example.com'
    ],
    [
        "name" => 'Title2',
        "author" => "SDSdasdasd",
        "releaseYear" => 1922,
        "purchaseUrl" => 'http://example.com'
    ],
    [
        "name" => 'Title3',
        "author" => "OOOOOppp",
        "releaseYear" => 2001,
        "purchaseUrl" => 'http://example.com'
    ],
];

$filteredBooks = array_filter($books, function ($book) {
    return $book["releaseYear"] >= 1950;
});

require "views/index.view.php";

