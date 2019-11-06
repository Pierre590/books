<?php

require_once('utils/db.php');

$limit = 8;

function countBooks ()
{
    $db = dbConnect ();

    $bookTotalReq = $db->query('SELECT id FROM books');
    return $bookTotalReq -> rowCount();

}

function getBooks(string $start): array
{
   $count = countBooks();
   global $page;
   global $limit;
   $offset = ($page - 1) * $limit;

    $db = dbConnect ();

    $stmt = $db->prepare('SELECT 
        books.* , 
        authors.name AS author 
        FROM books 
        LEFT JOIN authors 
        ON books.author_id = authors.id
        LIMIT :offset, :limit

    ');

    $stmt->bindParam (':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam (':limit',$limit, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getbook($id)
{
    $db = dbConnect ();

    $stmt = $db->prepare('SELECT
    books.* , 
    authors.name AS author 
    FROM books 
    LEFT JOIN authors 
    ON books.author_id = authors.id
    WHERE books.id = :id
   ');
    $stmt->bindParam ('id',$id,PDO::PARAM_INT);

    $stmt->execute();
    
    return $stmt->fetch();

}




