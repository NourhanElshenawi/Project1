<?php


use Nourhan\Database\DB;

echo "LLLLLLLLLL";

$incl = $_GET['key1'];

echo $incl;


$DB = new DB();

$DB->includeInCarousel($incl);

//var_dump($_POST['key1']);