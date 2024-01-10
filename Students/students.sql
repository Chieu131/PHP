
CREATE TABLE if not exists `students`(
    id int(11) NOT NULL AUTO_INCREMENT,
    name Nvarchar(100) NOT NULL ,
    email varchar(250) NOT NULL ,
    PRIMARY KEY (id)
) ENGINE =InnoDB DEFAULT  CHARSET = latin1 AUTO_INCREMENT=2;
INSERT INTO `students` (`id`, `name`, `email`) VALUES
(1, 'Roland Mendel', 'david101@gmail.com'),
(2, 'Victoria Ashworth', 'victo1@gmail.com'),
(3, ’Martin Blank’, 'martn@gmail.com');
