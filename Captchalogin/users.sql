CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
   `user_name` varchar(55) NOT NULL,
  `password` varchar(12) NOT NULL,
  `display_name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `users` (`id`, `user_name`, `password`, `display_name`) VALUES
(1, 'admin', 'admin', 'Admin');