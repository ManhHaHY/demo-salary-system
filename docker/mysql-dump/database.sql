create table employee
(
	id int(11) auto_increment,
	first_name varchar(32) null,
	last_name varchar(32) null,
	birthday date null,
	kids smallint(4) null default 0,
	use_car smallint(1) null default 0,
	salary float (11) null default 0,
	constraint employee_pk
		primary key (id)
);

INSERT INTO demo_salary.employee(id, first_name, last_name, birthday, kids, use_car, salary) VALUES
(1, 'Mrs', 'Alice', '1993-03-18', 2, 0, 6000),
(2, 'Mr', 'Bob', '1967-04-01', 0, 1, 4000),
(3, 'Mr', 'Charlie', '1983-01-22', 3, 1, 5000);