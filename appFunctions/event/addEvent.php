<?php

require_once 'login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

			//Event ID:<input type="text" name="evid"></br></br>
			//Team ID:<input type='text' name='tid'></br></br>
			//Venue ID:<input type='text' name='vid'></br></br>
echo <<<_END
<form action="addEvent.php" method="post"<pre>
			
			Income:<input type='text' name='income'></br></br>
			Event Date:<input type='text' name='edate'></br></br>
			Opposing Team:<input type='text' name='vsteam'></br></br>
			Attendance:<input type='text' name='atd'></br></br>


	<input type="submit" name="ADD Event">
	</br></br>
	<a href="viewEvent.php" >View all Events</a>
</pre></form>
_END;

evid, income, edate, vsteam, atd, tid, vid
id, income, event_date, opposing_team, attendance, team_id, venue_id
if(isset($_POST['evid'])) 
		{
		// $evid = get_post($conn, 'evid');
		$income = get_post($conn, 'fname');
		$edate = get_post($conn, 'lname');
		$vsteam = get_post($conn, 'position');
		$atd = get_post($conn, 'al');
		// $tid = get_post($conn, 'strc');
		// $vid = get_post($conn, 'cc');

		// $query = "insert into event (id, income, event_date, opposing_team, attendance, team_id, venue_id) values ('$evid', '$income', '$edate', '$vsteam', '$atd', '$tid', '$vid')";
		
		$query = "insert into event (income, event_date, opposing_team, attendance) values ('$income', '$edate', '$vsteam', '$atd')";
		
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