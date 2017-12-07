##sql for u of u athletics site##

create database group_three;

use group_three;

#create tables

create table user (
id INT unsigned not null auto_increment key,
username varchar(128) not null,
fname varchar(128) not null,
lname varchar(128) not null,
role varchar(128) not null,
password varchar(128) not null
)
Engine InnoDB;

create table team (
id INT unsigned not null auto_increment key,
team_type varchar(128) not null,
rank INT(10) unsigned,
record varchar(10),
start_date date not null,
end_date date
)
Engine InnoDB;

create table equipment (
id INT unsigned not null auto_increment key,
equipment_type varchar(128) not null,
yearly_cost float not null,
year INT(4) unsigned
)
Engine InnoDB;

create table equipment_purpose (
equipment_id INT unsigned not null,
team_id INT unsigned not null,
index (equipment_id),
index (team_id),
foreign key (equipment_id) references equipment(id),
foreign key (team_id) references team(id)
)
Engine InnoDB;

##Leaving year off since I have no idea what it is for (year built?)
create table venue (
id INT unsigned not null auto_increment key,
venue_name varchar(128) not null,
street_venue varchar(128),
city_venue varchar(128),
state_venue varchar(128),
zip_venue char(5),
fees float
)
Engine InnoDB;

create table event (
id INT unsigned not null auto_increment key,
income float not null,
event_date date not null,
opposing_team varchar(128),
attendance INT(10) unsigned,
team_id INT unsigned not null,
venue_id INT unsigned not null,
index (team_id),
index (venue_id),
foreign key (team_id) references team(id),
foreign key (venue_id) references venue(id)
)
Engine InnoDB;

create table employee (
id INT unsigned not null auto_increment key,
title varchar(128) not null,
fname varchar(128) not null,
lname varchar(128) not null,
street_address varchar(128),
city_address varchar(128),
state_address varchar(128),
zip_address char(5),
type varchar(128) not null,
years_employed INT(4) unsigned,
team_id INT unsigned not null,
index (team_id),
foreign key (team_id) references team(id)
)
Engine InnoDB;

create table hourly_employee (
hourly_wage FLOAT not null,
yearly_wage FLOAT not null,
employee_id INT unsigned  not null,
index (employee_id),
foreign key (employee_id) references employee(id)
)
Engine InnoDB;

create table salary_employee (
salary FLOAT not null,
employee_id INT unsigned  not null,
index (employee_id),
foreign key (employee_id) references employee(id)
)
Engine InnoDB;

create table athlete (
id INT unsigned not null auto_increment key,
fname varchar(128) not null,
lname varchar(128) not null,
position varchar(128),
academic_level varchar(20),
street_current varchar(128),
city_current varchar(128),
state_current varchar(128),
zip_current char(5),
street_hometown varchar(128),
city_hometown varchar(128),
state_hometown varchar(128),
zip_hometown char(5),
phone char(10),
team_id INT unsigned not null,
index (team_id),
foreign key (team_id) references team(id)
)
Engine InnoDB;

create table scholarship (
id INT unsigned not null auto_increment key,
type varchar(128) not null,
amount float not null,
athlete_id INT unsigned not null,
index (athlete_id),
foreign key (athlete_id) references athlete(id)
)
Engine InnoDB;


