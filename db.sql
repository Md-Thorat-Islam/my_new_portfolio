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
  `dob` DATE,
  `gender` INTEGER UNSIGNED,
  `marital_status` VARCHAR(45),
  `nationality` VARCHAR(45) NOT NULL DEFAULT '',
  `nid` INTEGER UNSIGNED,
  `religion` INTEGER UNSIGNED,
  `home_town` VARCHAR(45) NOT NULL DEFAULT '',
  `address` VARCHAR(200) NOT NULL DEFAULT '',
  `primary_mobile` VARCHAR(45) NOT NULL DEFAULT '',
  `secondary_mobile` VARCHAR(45) NOT NULL DEFAULT '',
  `email` VARCHAR(45) NOT NULL DEFAULT '',
  `status` VARCHAR(45) NOT NULL DEFAULT '',
  `create_at` TIMESTAMP,
  PRIMARY KEY(`id`)
)
ENGINE = InnoDB;

