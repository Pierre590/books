<?php
require('models/books.php');

function listBooks($page)
{   
    global $limit;
    $count = countBooks();
    $nbpage = ceil($count/$limit);

    if($page > $nbpage) {
        $page = 1;
    }

    $start = ($page -1) * $limit;
    $books = getBooks((string) $start);
    require('views/books.php');
}

function showBook ($id)
{
    $book = getBook($id);

    require('views/book.php');
}
