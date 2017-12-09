<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/code/group_three/php/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Connection Error: ".$result->error);

if (isset($_POST['team_type'])) {
    $beg_date = $_POST['beg_date'];
    $beg_format_date = date_create($beg_date);
    $beg_year = substr($beg_date,0,4);
    $end_date = $_POST['end_date'];
    $end_format_date = date_create($end_date);
    $end_year = substr($end_date,0,4);
    //team_id
    $team_type = $_POST['team_type'];
    $query = "SELECT id from team where team_type = '$team_type'";
    $team_id = $conn->query($query);
    if (!$team_id) die("Select statement failed: " . $result->error);
    $row = $team_id->fetch_array(MYSQLI_NUM);
    $team_id = $row[0];
//EXPENSES
    //employees
    $query = "select round(sum(wages),2) employees from
                  (
                    select sum(yearly_wage) wages
                    from hourly_employee
                    where employee_id in (
                      select id from employee where team_id = '$team_id'
                    )
                    UNION ALL
                    select sum(salary) wages
                    from salary_employee
                    where employee_id in (
                      select id from employee where team_id = '$team_id'
                    )
                  )wages";
    $employees = $conn->query($query);
    if (!$employees) die("Employees Select statement failed: " . $result->error);
    $row = $employees->fetch_array(MYSQLI_NUM);
    $employees = $row[0];

    //students
    $query = "select round(sum(amount),2) scholarships
                from scholarship
                where athlete_id in (select id from athlete where team_id = $team_id)";
    $students = $conn->query($query);
    if (!$students) die("Students Select statement failed: " . $result->error);
    $row = $students->fetch_array(MYSQLI_NUM);
    $students = $row[0];

    //equipment
    $query = "select round(sum(yearly_cost),2) equip_cost
                from equipment
                where id in (select equipment_id from equipment_purpose where team_id = $team_id)
                and year between $beg_year and $end_year";
    $equipment = $conn->query($query);
    if (!$equipment) die("equipment Select statement failed: " . $result->error);
    $row = $equipment->fetch_array(MYSQLI_NUM);
    $equipment = $row[0];

//REVENUE
    //EVENTS
    $query = "select round(sum(income),2) event_income
                from event
                where team_id = $team_id
                and event_date between '$beg_date' and '$end_date'";
    $event_income = $conn->query($query);
    if (!$event_income) die("event_income Select statement failed: " . $result->error);
    $row = $event_income->fetch_array(MYSQLI_NUM);
    $event_income = $row[0];

}

$conn->close();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UTES - University of Utah Athletics</title>
    <meta name="description" content="IS6465Group3">
    <meta name="author" content="Austin">
    <meta name="keyword" content="html, css, bootstrap, job-board">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="js/jquery.js"></script>
</head>

<body style=" padding: 10px;">

<!-- Body content -->
<div class="header-connect">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-8 col-xs-8">
                <div class="header-half header-call">
                    <p>
                        </i>University of Utah Athletics Department, 1825 E. South Campus Dr,
                        Salt Lake City, UT 84112-0900</span>
                        <span><i class="icon-cloud"></i>+1 801-581-8171</span>
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
                <div class="header-half header-social">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- NAVBAR -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.utahutes.com/index.aspx"><img src="img/utes100.png" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="button navbar-right">
                <a href="appFunctions/logout.php" class="navbar-btn nav-button wow bounceInRight" role="button" data-wow-delay="0.4s">Logout</a>
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="wow fadeInDown" data-wow-delay="0s"><a class="active" href="#home">Home</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="appFunctions/athlete/viewAthlete.php">Athletes</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.2s"><a href="appFunctions/team/viewTeam.php">Teams</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.3s"><a href="appFunctions/event/viewEvent.php">Events</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.4s"><a href="appFunctions/employee/viewEmployee.php">Employees</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="appFunctions/equipment/viewEquipment.php">Equipment</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.6s"><a href="https://www.utahutes.com/calendar.aspx">Schedules</a></li>
            </ul>
        </div>
    </div>
</nav>
<hr>

<!-- SUMMARY -->

<div class="jumbotron">
    <div class="container text-center">
        <?php
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        echo '<h2 class="center-block">'."Income and Expense Summary For: " . ucfirst($team_type) . '</h2>';
        echo '<p class="lead">'. 'Report Dates Range from: ' . date_format($beg_format_date, 'M d, Y') . ' to ' . date_format($end_format_date, 'M d, Y') . '</p>';
        echo '<p class="text-info">'."INCOME" . '</p>';
        echo '<p class="text-muted">'."Event Income: " . money_format('%.2n',$event_income) . '<br>';
        echo '<p class="text-info">'."EXPENSES" . '</p>';
        echo '<p class="text-muted">'."Employee Wages: " . money_format('%.2n', $employees). '</p>';
        echo '<p class="text-muted">'."Students Scholarships: " . money_format('%.2n',$students). '</p>';
        echo '<p class="text-muted">'."Equipment Costs: " . money_format('%.2n',$equipment). '</p>';
        echo '<p class="text-info">'."NET GAINS/LOSSES" . '</p>';
        echo '<p class="text-muted">'."Gains/Losses: " . money_format('%.2n',($event_income - $employees - $students - $equipment)). '</p>';
        ?>
    </div>
</div>

<hr>

<!-- FOOTER -->
<div class="footer-area center">
    <div class="col-md-4">
        <div class="footer">
            <h4>Useful Links</h4>
            <div class="footer-links">
                <ul class="list-unstyled">
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/genrel-utah-mission-statement-html.aspx">Mission Statement</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/ot-ath-training-html.aspx" class="active">Athletic Training</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/school-bio-budget-fiscal-year-2016-html.aspx">Financial Information</a></li>
                    <li><a href="http://www.utahutes.com/staff.aspx">Staff Directory</a></li>
                    <li><a href="http://www.utahutes.com/facilities/">Facilities</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/ot-internships-html.aspx">Internships</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/trads-ute-trads-success-html.aspx">Utah Athletics History</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer col-md-5">
            <img src="img/utes200.png" alt="" class="img-rounded center-block">
            <p class="footer-copy">As an integral part of the University and the community, the Athletics Department complements and supports the overall mission of the University. </p>
        </div>
    </div>
</div>
<div class="footer">
    <div class="row panel-footer">
        <p><span>IS 6465 Web-based Application | Fall 2017 | Group 3 </span></p>
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/main.js"></script>
</body>
</html>