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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.utahutes.com/index.aspx"><img src="img/utes100.png" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="button navbar-right">
                <a href="appFunctions/userMgt/loginscreen.php" class="navbar-btn nav-button wow bounceInRight login" role="button"
                   data-wow-delay="0.4s">Login</a>
                <a role="button" class="navbar-btn nav-button wow fadeInRight" href="signup.html" data-wow-delay="0.6s">Sign
                    up</a>
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

<!-- SELECTION -->
<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="img/slider-image-3.jpg" alt="runner"></div>
            <div class="item"><img src="img/slider-image-2.jpg" alt="basketball"></div>
            <div class="item"><img src="img/slider-image-1.jpg" alt="football"></div>

        </div>
    </div>
    <div class="container slider-content">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1 col-sm-12 well text-muted">
                <h2 class="">Go Utes!</h2>
                <p>Choose your athletics team below and a date range</p>
                <div class="search-form wow pulse">
                    <form method="post" action="summary.php" class="form-group">
                        <input type="hidden" name="summary_page_link" value="summary.php">
                        <!-- Teams List Drop Down-->
                        <div class="form-group">
                        <select name="team_type" class="form-control">
                            <option>Select A Team</option>
                            <?php
                                include('php/teamslist.php');
                            ?>
                        </select>
                        </div>
                        <!-- date range-->
                        <label for="beg_date">Begin Date</label>
                        <input type="date" name="beg_date" id="beg_date" style="background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" style="background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="container">
    <div class="row job-posting wow" data-wow-delay="1s">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#job-seekers" aria-controls="home" role="tab"
                                                          data-toggle="tab">Teams</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="job-seekers">
                    <ul class="list-inline job-seeker">
                        <li>
                            <a href="">
                                <img src="img/team-football-small.jpeg" alt="">
                                <div class="overlay"><h3>Football</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-baseball-small.jpeg" alt="">
                                <div class="overlay"><h3>Baseball</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-softball-small.jpeg" alt="">
                                <div class="overlay"><h3>Softball</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-mensbasketball-small.jpeg" alt="">
                                <div class="overlay"><h3>Mens Basketball</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-womensbasketball-small.jpeg" alt="">
                                <div class="overlay"><h3>Womens Basketball</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-menshockey-small.jpeg" alt="">
                                <div class="overlay"><h3>Mens Hockey</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-womenshockey-small.jpeg" alt="">
                                <div class="overlay"><h3>Womens Hockey</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-fieldhockey-small.jpeg" alt="">
                                <div class="overlay"><h3>Field Hockey</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-menslacrosse-small.jpeg" alt="">
                                <div class="overlay"><h3>Mens Lacrosse</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-menssoccer-small.jpeg" alt="">
                                <div class="overlay"><h3>Mens Soccer</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-womenssoccer-small.jpeg" alt="">
                                <div class="overlay"><h3>Womens Soccer</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-polo-small.jpeg" alt="">
                                <div class="overlay"><h3>Polo</h3></div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="img/team-gymnastics-small.jpeg" alt="">
                                <div class="overlay"><h3>Gymnastics</h3></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FOOTER -->
<div class="footer-area center">
    <div class="col-md-4">
        <div class="footer">
            <h4>Useful Links</h4>
            <div class="footer-links">
                <ul class="list-unstyled">
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/genrel-utah-mission-statement-html.aspx">Mission
                            Statement</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/ot-ath-training-html.aspx" class="active">Athletic
                            Training</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/school-bio-budget-fiscal-year-2016-html.aspx">Financial
                            Information</a></li>
                    <li><a href="http://www.utahutes.com/staff.aspx">Staff Directory</a></li>
                    <li><a href="http://www.utahutes.com/facilities/">Facilities</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/ot-internships-html.aspx">Internships</a></li>
                    <li><a href="http://www.utahutes.com/sports/2016/6/10/trads-ute-trads-success-html.aspx">Utah
                            Athletics History</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer col-md-5">
            <img src="img/utes200.png" alt="" class="img-rounded center-block">
            <p class="footer-copy">As an integral part of the University and the community, the Athletics Department
                complements and supports the overall mission of the University. </p>
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
