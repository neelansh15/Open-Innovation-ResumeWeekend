CREATE TABLE `users` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`active_portfolio_id` bigint,
	`username` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL,
	`bio` TEXT,
	`image` TEXT,
	`mobile` varchar(255),
	`github` varchar(255),
	`linkedin` varchar(255),
	`facebook` varchar(255),
	`twitter` varchar(255),
	`devfolio` varchar(255),
	PRIMARY KEY (`id`)
);

CREATE TABLE `portfolios` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`user_id` bigint NOT NULL,
	`theme_id` int NOT NULL,
	`name` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `themes` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` bigint NOT NULL,
	`cssPath` TEXT(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `projects` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`user_id` bigint NOT NULL,
	`portfolio_id` bigint NOT NULL,
	`title` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`tagsJSON` varchar(255) NOT NULL,
	`github` varchar(255) NOT NULL,
	`website` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `work` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`user_id` bigint NOT NULL,
	`company` varchar(255) NOT NULL,
	`role` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`start` varchar(100) NOT NULL,
	`end` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`active_portfolio_id`) REFERENCES `portfolios`(`id`);

ALTER TABLE `portfolios` ADD CONSTRAINT `portfolios_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `portfolios` ADD CONSTRAINT `portfolios_fk1` FOREIGN KEY (`theme_id`) REFERENCES `themes`(`id`);

ALTER TABLE `projects` ADD CONSTRAINT `projects_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `projects` ADD CONSTRAINT `projects_fk1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios`(`id`);

ALTER TABLE `work` ADD CONSTRAINT `work_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

