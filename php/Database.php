<?php

$Database_connection = new mysqli("localhost","root","");
if($Database_connection->connect_error){die("Error connecting to server");}

if(!$Database_connection->query("Create database GovAppointment")){die("error creating db");}

$Database_connection = new mysqli("localhost","root","","GovAppointment");

if(!$Database_connection->query("Create table Department(Department_id int primary key, Name varchar(50) not null)")){die("Error creating departments");}
if(!$Database_connection->query("
    Insert into Department
    values(1,'Municipality'),
        (2,'ElectricityAuthority'),
        (3,'WaterDepartment')
    ")){die("Error inserting data in departments");}


if(!$Database_connection->query("
    create table User(
            User_id int primary key auto_increment,
            Name varchar(50) not null,
            Password varchar(50) not null,
            Email varchar(100) not null unique,
            Contact varchar(100),
            Location varchar(100)
        )
")){die("Error creating user");}

if(!$Database_connection->query("
    create table complain(
            Complain_id int primary key auto_increment,
            Title varchar(100) not null,
            Description varchar(250),
            Is_read boolean,

            User_id int,
            Department_id int,

            foreign key (User_id) references User(User_id),
            foreign key (Department_id) references Department(Department_id)

        )
")){die("Error creating complain db");}


if(!$Database_connection->query("
    create table Appointment(
            Appointment_id int primary key auto_increment,
            Service varchar(25) not null,
            Date varchar(20) not null,
            Time varchar(25) not null,
            Address varchar(50),
            Is_accepted boolean,

            User_id int,
            Department_id int,

            foreign key (User_id) references User(User_id),
            foreign key (Department_id) references Department(Department_id)

        )
")){die("error creating appointment data");}

echo "database created now start working on other stuff";




?>