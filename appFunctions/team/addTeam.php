<?php

require_once '../login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
			
echo <<<_END
<form action="addTeam.php" method="post"<pre>
			Team ID:<input type="text" name="tid"></br></br>
			Team Type:<input type='text' name='ttype'></br></br>
			Rank:<input type='text' name='rank'></br></br>
			Record:<input type='text' name='record'></br></br>
			Date of Start:<input type='text' name='dos'></br></br>
			Date of End:<input type='text' name='doe'></br></br>

	<input type="submit" name="ADD TEAM">
	</br></br>
	<a href="viewTeam.php" >View all Teams</a>
</pre></form>
_END;


if(isset($_POST['tid'])) 
		{
		$tid = get_post($conn, 'tid');
		$ttype = get_post($conn, 'ttype');
		$rank = get_post($conn, 'rank');
		$record = get_post($conn, 'record');
		$dos = get_post($conn, 'dos');
		$doe = get_post($conn, 'doe');
		
		$query = "insert into team (team_type, rank, record, start_date, end_date) values ('$ttype', '$rank', '$record', '$dos', '$doe')";
		
		$result=$conn->query($query);
		if(!$result) echo "INSERT failed: $query <br>" .
			$conn->error . "<br><br>";
	
	//$result->close();	
}
$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>