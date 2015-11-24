-- Choose your own adventure sql creation 

CREATE DATABASE IF NOT EXISTS `chooseYourAdventure`; 
use chooseYourAdventure;

CREATE TABLE IF NOT EXISTS `monsters` (
	`id` INT NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(45) NOT NULL,
	`hitpoints` INT NOT NULL,
	`def` INT NOT NULL, 
	`attack` INT NOT NULL,  
	PRIMARY KEY (`id`));  

INSERT INTO monsters values 
	('', 'Zombie',22, 1, 8), 
	('', 'Ogre', 20, 1, 8), 
	('', 'Troll', 23, 1, 8);
	