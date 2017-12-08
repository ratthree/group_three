<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/code/group_three/php/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn-> connect_error);

$query = "select * from classics";
$result = $conn->query($query);

$rows = $result->num_rows;

for ($i = 0 ; $i < $rows ; ++$i)
{
    $result->data_seek($i);
    echo 'Author: ' . $result->fetch_assoc()['author'].'<br>';
    $result->data_seek($i);
    echo 'Title: ' . $result->fetch_assoc()['title'].'<br>';
    $result->data_seek($i);
    echo 'Category: ' . $result->fetch_assoc()['category'].'<br>';
    $result->data_seek($i);
    echo 'Year: ' . $result->fetch_assoc()['year'].'<br>';
    $result->data_seek($i);
    echo 'ISBN: ' . $result->fetch_assoc()['isbn'].'<br><br>';
}

$result->close();
$conn->close();

?>
