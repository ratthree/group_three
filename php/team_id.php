<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/code/group_three/php/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection Error: ".$result->error);

if (isset($_POST['team_type'])) {
    $team_type = $_POST['team_type'];
    $beg_date = $_POST['beg_date'];
    $end_date = $_POST['end_date'];
    $query = "SELECT id from team where team_type = '$team_type'";

    $team_id = $conn->query($query);

    if(!$team_id) die("Select statement failed: " . $result->error);

    $team_id->data_seek($i);
    $row = $team_id->fetch_array(MYSQLI_ASSOC);
    $team_id = $row[id];

    $conn->close();

}

?>