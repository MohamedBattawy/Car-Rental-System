create table customer(customer_id int AUTO_INCREMENT primary key,fname varchar(256),lname varchar(256),e_mail varchar(256),pass varchar(256));

create table office(office_id int AUTO_INCREMENT primary key, location varchar(256),name varchar(256),e_mail varchar(256),pass varchar(256)); 

create table admin(e_mail varchar(256),pass varchar(256),CONSTRAINT superkey1 PRIMARY key (e_mail,pass));

create table car(plate_id int PRIMARY key,model varchar(256),`year` int,color varchar(256),price_per_day int,stats varchar(256),office_id int, FOREIGN KEY (office_id) REFERENCES office(office_id) on update cascade on delete cascade);

create table rent(customer_id int,plate_id int,start_date date,end_date date,price int,payment_date date ,CONSTRAINT superkey2 PRIMARY key(customer_id,plate_id,start_date,end_date),FOREIGN key (customer_id) REFERENCES customer(customer_id) on update cascade on delete cascade,FOREIGN KEY (plate_id) REFERENCES car(plate_id) on update cascade on delete cascade);

create table carstats(plate_id int,stats varchar(256),start_date date,FOREIGN KEY(plate_id) REFERENCES car(plate_id) on update cascade on delete cascade,CONSTRAINT superkey PRIMARY key(plate_id,stats,start_date))