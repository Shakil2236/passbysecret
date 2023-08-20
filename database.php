<?php
session_start();
if ($_SERVER['REMOTE_ADDR'] == '::1') 

/*firmware database*/ 
{
    $con = mysqli_connect('localhost', 'root', '', 'BD Name');
} else {
    $con =mysqli_connect('localhost', /*user*/ '', /*password*/ '', /*database*/ '');
}
/*password database*/ 
$con2 = mysqli_connect('localhost', /*user*/'', /*password*/'', /*database*/'');