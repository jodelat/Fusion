create database fusion;

use fusion;

create table clients (
  id int(11) auto_increment primary key,
  name varchar(30) not null
);

create table sections (
  id int(11) auto_increment primary key,
  name varchar(30) not null,
  client_id int not null,
  foreign key(client_id) references clients(id) ON DELETE CASCADE
);

create table links (
  id int(11) auto_increment primary key,
  name varchar(30) not null,
  section_id int not null,
  foreign key(section_id) references sections(id) ON DELETE CASCADE
);
