<?php

function dbConnect ()
{
    return new PDO ('mysql:host=localhost;dbname=books-old','root');
}
