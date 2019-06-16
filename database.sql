create table employee
(
	id int(11) auto_increment,
	name varchar(250) null,
	email varchar(250) null,
	birthday date null,
	dependent_person smallint(4) null,
	use_company_car smallint(1) null,
	constraint employee_pk
		primary key (id)
);

create unique index employee_email_uindex
	on employee (email);