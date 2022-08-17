# HostelManagement

USE XAMPP- for running localhost mysqli server
run index.php directly on web by calling localhost/<absolute path of index.php>

SQL CODE-
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-Creating gatePass table
CREATE TABLE gatepass(
    regno int(10) NOT NULL,
    name varchar(20) NOT NULL,
    hostel_no int(2) NOT NULL,
    room_no int(3) NOT NULL,
    from_date date NOT NULL,
    from_time time NOT NULL,
    to_date date NOT NULL,
    to_time time NOT NULL,
    reason varchar(128) NOT NULL,
    stat varchar(20),
    CONSTRAINT fk_reg FOREIGN KEY(regno) REFERENCES roomdetails(regno),
    CONSTRAINT ch_stat CHECK (stat IN("PENDING","APPROVED","DENIED")
);

-Format for inserting
INSERT INTO gatepass VALUES(20500167,"Nandakishor",1,123,"2022-8-10","21:00","2022-8-12","12:00","Going Home","PENDING");
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-Creating hosteldetails table
CREATE TABLE roomdetails(
    regno int(10) PRIMARY KEY NOT NULL,
    hostelno int(2) NOT NULL,
    roomno int(2) NOT NULL
);
-Format for inserting
INSERT INTO roomdetails VALUES(205001067,1,123);

![database](https://user-images.githubusercontent.com/80710226/183067971-d68efd8b-66c2-4283-95b4-5340ab6bf93d.jpg)
# Database view with formats
[database.pdf](https://github.com/nitheeshk03/HostelManagement/files/9268140/database.pdf)
