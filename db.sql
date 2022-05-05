CREATE TABLE `db_my_portfolio`.`menu_tb` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL DEFAULT '',
  `href` VARCHAR(45) NOT NULL DEFAULT '',
  `target` VARCHAR(45) NOT NULL DEFAULT '0',
  `selected` VARCHAR(45) NOT NULL DEFAULT '0',
  `disable` VARCHAR(45) NOT NULL DEFAULT '0',
  `section` VARCHAR(45) NOT NULL DEFAULT '0',
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ENGINE = InnoDB;
insert into `db_my_portfolio`.`menu_tb`(name,href,target,selected,disable,section,create_at)values('home','home',0,0,
0,0,now());
insert into `db_my_portfolio`.`menu_tb`(name,href,target,selected,disable,section,create_at)values('about','about',0,0,0,0,now());
insert into `db_my_portfolio`.`menu_tb`(name,href,target,selected,disable,section,create_at)values('about','about',0,0,0,0,now());


CREATE TABLE `db_my_portfolio`.`title_tb` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `menu_href_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `disable` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ENGINE = InnoDB;

CREATE TABLE `db_my_portfolio`.`about` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(45) NOT NULL DEFAULT '',
  `position` VARCHAR(45) NOT NULL DEFAULT '',
  `lives_in_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `from_id` VARCHAR(45) NOT NULL DEFAULT '',
  `gender` VARCHAR(45) NOT NULL DEFAULT '',
  `curent_service_company` VARCHAR(45) NOT NULL DEFAULT '',
  `joining_date` DATE,
  `leaves_date` DATE,
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ALTER TABLE `db_my_portfolio`.`about` MODIFY COLUMN `discription` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE
utf8mb4_general_ci NOT NULL DEFAULT '''';
ALTER TABLE `db_my_portfolio`.`about` ADD COLUMN `date_of_birth` DATE AFTER `discription`;


CREATE TABLE `db_my_portfolio`.`users` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL DEFAULT '',
  `father_name` VARCHAR(45) NOT NULL DEFAULT '',
  `mother_name` VARCHAR(45) NOT NULL DEFAULT '',
  `nationality` VARCHAR(45) NOT NULL DEFAULT '',
  `primary_mobile` VARCHAR(45) NOT NULL DEFAULT '',
  `secondary_mobile` VARCHAR(45) NOT NULL DEFAULT '',
  `email` VARCHAR(45) NOT NULL DEFAULT '',
  `dob` DATE,
  `gender_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `marital_status_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `nid` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `religion_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `home_town_divisions_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `home_town_districts_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `home_town_upazilas_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `current_location_divisions_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `current_location_districts_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `current_location_upazilas_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `status` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ENGINE = InnoDB;
insert into `db_my_portfolio`.`users`(name,father_name,mother_name,nationality,primary_mobile,
secondary_mobile,email,dob,gender_id,marital_status_id,nid,religion_id,home_town_divisions_id,home_town_districts_id,
home_town_upazilas_id,current_location_divisions_id,current_location_districts_id,current_location_upazilas_id,status,create_at)
values('Engr Muhammad Tourat Islam','Md Abu Hossain','Parvin Nahar','Bangladeshi','01517123534','01307435890',
'mdthoratislam1993.oni@gmail.com','1995-05-04',0,0,6441413637,0,5,41,0,3,18,0,1,now());

CREATE TABLE `db_my_portfolio`.`divisions` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  `create_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Barisal','1993',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Chittagong','1829',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Dhaka','1829',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Khulna','1960',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Mymensingh','2015',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Rajshahi','1829',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Rangpur','2010',now());
insert into `db_my_portfolio`.`divisions`(name,code,create_at)values('Sylhet','1995',now());

CREATE TABLE `db_my_portfolio`.`districts` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `name` VARCHAR(45) NOT NULL DEFAULT '',
  `code` VARCHAR(45) NOT NULL DEFAULT '',
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ENGINE = InnoDB;

-- Start Barisal division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(1,'Barguna','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(1,'Barisal','1797',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(1,'Bhola','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(1,'Jhalokati','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(1,'Patuakhali','1969',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(1,'Pirojpur','1984',now());
-- End Barisal division

-- Start Chittagong division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Bandarban','1981',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Brahmanbaria','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Chandpur','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Chittagong','1666',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Comilla','1790',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Coxs Bazar','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Feni','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Khagrachhari','1983',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Lakshmipur','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Noakhali','1821',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(2,'Rangamati','1983',now());
-- End Chittagong division

-- Start Dhaka division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Dhaka','1772',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Faridpur','1815',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Gazipur','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Gopalganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Kishoreganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Madaripur','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Manikganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Munshiganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Narayanganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Narsingdi','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Rajbari','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Shariatpur','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(3,'Tangail','1969',now());
-- End Dhaka division

-- Start Khulna division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Bagerhat','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Chuadanga','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Jessore','1781',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Jhenaidah','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Khulna','1882',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Kushtia','1947',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Magura','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Meherpur','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Narail','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(4,'Satkhira','1984',now());
-- End Khulna division

-- Start Mymensingh division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(5,'Jamalpur','1978',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(5,'Mymensingh','1787',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(5,'Netrokona','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(5,'Sherpur','1984',now());
-- End Mymensingh division

-- Start Rajshahi division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Bogra','1821',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Joypurhat','1983',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Naogaon','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Natore','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Chapainawabganj','1884',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Pabna','1832',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Rajshahi','1772',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(6,'Sirajganj','1984',now());
-- End Rajshahi division

-- Start Rangpur division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Dinajpur','1786',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Gaibandha','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Kurigram','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Lalmonirhat','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Nilphamari','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Panchagarh','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Rangpur','1772',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(7,'Thakurgaon','1984',now());
-- End Rangpur division

-- Start Sylhet division
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(8,'Habiganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(8,'Moulvibazar','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(8,'Sunamganj','1984',now());
insert into `db_my_portfolio`.`districts`(division_id,name,code,create_at)values(8,'Sylhet','1782',now());
-- End Sylhet division

CREATE TABLE `db_my_portfolio`.`upazilas`(
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` INTEGER UNSIGNED NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `km` VARCHAR(45) NOT NULL,
  `create_at` TIMESTAMP,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(1,'Amtali','720.76',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(1,'Bamna','101.05',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(1,'Barguna Sadar','454.39',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(1,'Betagi','167.75',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(1,'Patharghata','387.36',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(1,'Taltali','258.94',now());
-- end Barguna

-- start Barisal
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Agailjhara','155.47',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Babuganj','164.88',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Bakerganj','417.2',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Banaripara','134.32',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Barisal Sadar','324.41',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Gournadi','144.18',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Hizla','515.36',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Mehendigan','435.79',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Muladi','261.02',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(2,'Wazirpur','248.35',now());
-- end Barisal

-- start Bhola
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Bhola Sadar','413.16',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Daulatkhan','316.99',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Burhanuddin','284.67',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Tazumuddin','512.92',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Lalmohan','396.24',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Char Fasson','1440.04',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(3,'Manpura','373.19',now());
-- end Bhola

-- start Jhalokati
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(4,'Jhalokati Sadar','204.48',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(4,'Kathalia','152.08',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(4,'Nalchity','237.17',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(4,'Rajapur','164.33',now());
-- end Jhalokati

-- start Patuakhali 
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Dumki','92.46',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Patuakhali Sadar','362.62',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Mirzaganj','175.45',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Bauphal','486.91',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Galachipa','925.08',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Dashmina','351.74',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Rangabali','470.12',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(5,'Kalapara','483.08',now());
-- end Patuakhali 

-- start Pirojpur  
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Bhandaria','163.56',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Kawkhali','79.64',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Mathbaria','353.25',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Nazirpur','233.65',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Nesarabad (Swarupkati)','199.14 ',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Pirojpur Sadar','278.37 ',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(6,'Indurkani','',now());
-- end Pirojpur

-- start bandarban
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Ali Kadam','885.78',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Bandarban Sadar','501.99',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Lama','671.84',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Naikhongchhari','463.61',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Rowangchhari','442.89',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Ruma','492.1',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(7,'Thanchi','1,020.82',now());
-- end bandarban

-- start bramanbaria
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Akhaura','98.04',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Ashuganj','67.59',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Bancharampur','217.38',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Bijoynagar','185.8',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Brahmanbaria Sadar','237.34',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Kasba','209.77',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Nabinagar','353.66',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Nasirnagar','311.66',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(8,'Sarail','239.52',now());
-- end bramanbaria

-- start Chandpur
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Chandpur Sadar','308.78',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Dhakirgaon','0.92',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Faridganj','231.56',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Haimchar','174.49',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Haziganj','189.9',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Kachua Upazila','235.81',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Matlab Dakshin','131.69',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(9,'Shahrasti','154.83',now());
-- end Chandpur

-- start Chittagong
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Anwara','164.13',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Banshkhali','376.9',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Boalkhali','145.44',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Chandanaish','201.99',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Fatikchhari','773.13',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Hathazari','251.28',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Karnaphuli','0',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Lohagara','258.87',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Mirsharai','482.88',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Patiya','316.47',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Rangunia','347.72',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Raozan','246.58',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Sandwip','762.42',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Satkania','280.99',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(10,'Sitakunda','273.47',now());
-- end Chittagong

-- start Comilla
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Barura','242',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Brahmanpara','128.9',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Burichang','163.76',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Comilla Adarsha Sadar','187.71',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Comilla Sadar Dakshin','241.66',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Chandina','201.92',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Chauddagram','271.73',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Daudkandi','376.23',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Debidwar','238.36',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Homna','180.13',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Laksam','135.61',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Lalmai','147.03',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Monohorgonj','166.50',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Meghna','98.47',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Muradnagar','340.73',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Nangalkot','225.95',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(11,'Titas','125.74',now());
-- end Comilla

-- start Cox's Bazar
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Chakaria','643.46',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Cox`s Bazar Sadar','228.23',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Eidgaon','119.66',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Kutubdia','215.8',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Moheshkhal','362.18',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Ramu','391.71',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Teknaf','388.68',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(12,'Ukhia','261.8',now());
-- end Cox's Bazar

-- start Feni
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(13,'Chhagalnaiya','133.49',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(13,'Daganbhuiyan','165.84',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(13,'Feni Sadar','197.33',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(13,'Fulgazi','99.03',now());
insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(13,'Parshuram','196.61',now());

insert into `db_my_portfolio`.`upazilas`(district_id,name,km,create_at)values(13,'Sonagazi','235.07',now());
-- end Chittagong

CREATE TABLE `db_my_portfolio`.`myself_tb` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `description` VARCHAR(345) NOT NULL DEFAULT '6640',
  `code` VARCHAR(45) NOT NULL DEFAULT '',
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ENGINE = InnoDB;
insert into `db_my_portfolio`.`myself_tb`(users_id,description)values(1,'I am a Professional Web Application developer
 with more than 1 years’ experience. I am work in Laravel-8 and WordPress/WooCommerce. WordPress Theme Customization, PHP(OOP), CSS issues. I love working with my clients to provide them excellent services with 100% satisfaction. if you need this service please contact me and get your all issues solved.');

