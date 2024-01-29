CREATE TABLE contacts (
`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(30) NOT NULL,
`PhoneNumber` VARCHAR(15) NOT NULL
);

INSERT INTO `contacts` (`id`, `name`, `PhoneNumber`) VALUES
(1, 'Pham Kim Kien', 0987654321),
(2, 'Dang Dinh Chieu', 0987654322),
(3, 'Pham Tuan Anh', 0987654323);