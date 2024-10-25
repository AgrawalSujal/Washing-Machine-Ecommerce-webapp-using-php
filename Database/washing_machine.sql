SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `user`

CREATE TABLE `user` (
                        `user_id` int(11) NOT NULL,
                        `first_name` varchar(100) NOT NULL,
                        `last_name` varchar(100) NOT NULL,
                        `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `product`

CREATE TABLE `product` (
                           `item_id` int(11) NOT NULL,
                           `item_brand` varchar(200) NOT NULL,
                           `item_name` varchar(255) NOT NULL,
                           `item_price` double(10,2) NOT NULL,
                           `item_image` varchar(255) NOT NULL,
                           `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `cart`

CREATE TABLE `cart` (
                        `cart_id` int(11) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `wishlist`

CREATE TABLE `wishlist` (
                            `cart_id` int(11) NOT NULL,
                            `user_id` int(11) NOT NULL,
                            `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung', 152.00, './assets/image1.jpeg', '2020-03-28 11:08:57'),
(2, 'LG', 'LG', 122.00, './assets/image4.jpg', '2020-03-28 11:08:57'),
(3, 'Bosch', 'Bosch', 122.00, './assets/image6.jpeg', '2020-03-28 11:08:57'),
(4, 'LG Super', 'LG Super', 122.00, './assets/image2.jpeg', '2020-03-28 11:08:57'),
(5, 'EcoBubble ', 'EcoBubble', 122.00, './assets/image3.jpeg', '2020-03-28 11:08:57'),
(6, 'Televista', 'Televista', 122.00, './assets/image4.jpg', '2020-03-28 11:08:57');


INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
                                                                               (1, 'Daily', 'Tuition', '2020-03-28 13:07:17'),
                                                                               (2, 'Akshay', 'Kashyap', '2020-03-28 13:07:17');

ALTER TABLE `cart`
    ADD PRIMARY KEY (`cart_id`);


ALTER TABLE `product`
    ADD PRIMARY KEY (`item_id`);


ALTER TABLE `user`
    ADD PRIMARY KEY (`user_id`);




ALTER TABLE `cart`
    MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `product`
    MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


ALTER TABLE `user`
    MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
;