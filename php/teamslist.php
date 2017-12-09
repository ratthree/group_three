<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/code/group_three/php/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if (! $conn->connect_error){

    $query = "SELECT team_type from team order by team_type";

    $result = $conn->query($query);
    if(!$result) die("Select statement failed: " . $result->error);

    $rows=$result->num_rows;
    for($i=0; $i<$rows; $i++)
    {
        $result->data_seek($i);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<option>' . $row[team_type]. '</option>'.'<br>';
    }
    $conn->close();
    
}


?>