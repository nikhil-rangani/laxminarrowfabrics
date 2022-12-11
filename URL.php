<?php
require "Db_config.php";
$brachDisplayquery = db_select("SELECT * FROM inquiry ORDER BY id DESC limit 10 ",'inquiry','SELECT');
//echo gettype($brachDisplayquery);

IF( gettype($brachDisplayquery) == 'string'){
    header('Location: index.html');
}
$emparray = array();
while($row =mysqli_fetch_assoc($brachDisplayquery))
{
    $emparray[] = $row;
}
//print_r($emparray);
$jsondata= json_encode($emparray);
PRINT_R($jsondata);
die();
?>