##sql for u of u athletics site##

#team
insert into team (team_type, rank, record, start_date) values ('Mens Hockey',2,'10-3-1', '1995-10-19');

#equipment
equipment equipment_type, yearly_cost, year
insert into equipment (equipment_type, yearly_cost, year) values ('Hockey Equipment',15000.00,'2010');

#equipment_purpose
equipment_purpose equipment_id, team_id
insert into equipment_purpose (equipment_id, team_id) values (1,1);

#venue
venue venue_name, street_venue, city_venue, state_venue, zip_venue, fees

#event
event income, event_date, opposing_team, attendance, team_id, venue_id

#employee
employee title, fname, lname, street_address, type, years_employed, team_id

#hourly_employee
hourly_employee hourly_wage, yearly_wage, employee_id

#salary_employee
salary_employee salary, employee_id

#athlete
athlete fname, lname, position, academic_level, street_current, city_current, state_current, zip_current, street_hometown, city_hometown, state_hometown, zip_hometown, phone, team_id

#scholarship
scholarship type, amount, athlete_id


