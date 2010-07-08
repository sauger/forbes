ALTER TABLE `forbes`.`fb_subject_link` ADD COLUMN `is_adopt` integer  NOT NULL DEFAULT 0 AFTER `title`,
 ADD COLUMN `subject_id` integer  NOT NULL AFTER `is_adopt`;
