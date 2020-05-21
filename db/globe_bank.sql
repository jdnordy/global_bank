DROP TABLE IF EXISTS `pages` CASCADE;
DROP TABLE IF EXISTS `subjects` CASCADE;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `subjects` (menu_name, position, visible)
VALUES ('About Globe Bank',1,1),('Consumer',2,1),('Small Business',3,0);

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`subject_id`) REFERENCES subjects(id)
);

ALTER TABLE `pages` ADD INDEX `fk_subject_id` (`subject_id`);

INSERT INTO pages (subject_id, page_name, position, visible) VALUES (1, 'Globe Bank', 1, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (1, 'History', 2, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (1, 'Leadership', 3, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (1, 'Contact Us', 4, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (2, 'Banking', 1, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (2, 'Credit Cards', 2, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (2, 'Mortgages', 3, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (3, 'Checking', 1, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (3, 'Loans', 2, 1);
INSERT INTO pages (subject_id, page_name, position, visible) VALUES (3, 'Merchant Services', 3, 1);
