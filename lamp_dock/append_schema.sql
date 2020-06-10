START TRANSACTION;

CREATE TABLE `history` (
    `order_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `details` (
    `order_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    `price` int(11) NOT NULL,
    `amount` int(11) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `history`
    ADD PRIMARY KEY (`order_id`),
    ADD KEY `user_id` (`user_id`);

ALTER TABLE `details`
    ADD PRIMARY KEY (`order_id`),
    ADD KEY `item_id` (`item_id`);

ALTER TABLE `history`
    MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `details`
    MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `history`
    ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `details`
    ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

COMMIT;