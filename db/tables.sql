-- data
create table travel (page_no int AUTO_INCREMENT PRIMARY KEY,title varchar(255),area varchar(255),image varchar(255),data TEXT,uploadtime varchar(255));
--admin
create table admin (email varchar(255),password varchar(255));
insert into admin values('admin','admin');
--contact
create table contact (c_no int AUTO_INCREMENT PRIMARY KEY, name varchar(255), email varchar(255), message varchar(255));
--calls
create table calls (mno varchar(255));