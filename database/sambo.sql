-- All Cteate field database batal with this project
ALTER TABLE `tmc_school`.`users`
ADD COLUMN `mobile` varchar(255) NULL AFTER `password`,
ADD COLUMN `address` varchar(255) NULL AFTER `mobile`,
ADD COLUMN `gender` varchar(255) NULL AFTER `address`,
ADD COLUMN `image` varchar(255) NULL AFTER `gender`,
ADD COLUMN `status` tinyint(255) NULL AFTER `image`;
