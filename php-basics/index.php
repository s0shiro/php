<?php
    $books = array(
        array(
            "name" => "The Adventures of Huckleberry Finn",
            "author" => "Mark Twain",
            "year" => 1884,
            "url" => "https://example.com/huckleberry-finn"
        ),
        array(
            "name" => "Nineteen Eighty-Four",
            "author" => "George Orwell",
            "year" => 1949,
            "url" => "https://example.com/nineteen-eighty-four"
        ),
        array(
            "name" => "Alice's Adventures in Wonderland",
            "author" => "Lewis Carroll",
            "year" => 1865,
            "url" => "https://example.com/alice-in-wonderland"
        ),
        array(
            "name" => "The Catcher in the Rye",
            "author" => "J.D. Salinger",
            "year" => 1951,
            "url" => "https://example.com/catcher-in-the-rye"
        )
    );

    $filteredBooks = array_filter($books, function($book) {
        return $book["year"] < 1900;
    });

 require "index.view.php";