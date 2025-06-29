CREATE TABLE `users` ( `id` int NOT NULL AUTO_INCREMENT, `username` varchar(50) NOT NULL, `password` varchar(255) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `username` (`username`));

CREATE TABLE `shifts` ( `id` int NOT NULL AUTO_INCREMENT, `user_id` int NOT NULL, `shift_date` date NOT NULL, `shift_type` varchar(50) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `unique_shift` (`user_id`,`shift_date`));