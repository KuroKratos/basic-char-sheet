-- Creating Character Sheet table

CREATE TABLE IF NOT EXISTS `char` (
`id` int(11) NOT NULL,
  `char_name` varchar(128) NOT NULL, -- Character's full name
  `char_class` int(32) NOT NULL, -- Character's class ID (from char_class)
  `char_race` int(32) NOT NULL, -- Character's race id (from char_race)
  `char_age` varchar(128) NOT NULL, -- Character's age description
  `char_height` varchar(128) NOT NULL,
  `char_weight` varchar(128) NOT NULL,
  `char_details` text NOT NULL,
  `char_current_hp` int(32) NOT NULL,
  `char_max_hp` int(32) NOT NULL,
  `char_current_mp` int(32) NOT NULL,
  `char_max_mp` int(32) NOT NULL,
  `char_gold` int(32) NOT NULL,
  `char_str_mod` int(32) NOT NULL,
  `char_psy_mod` int(32) NOT NULL,
  `char_luk_mod` int(32) NOT NULL,
  `char_def_mod` int(32) NOT NULL,
  `char_current_exp` int(32) NOT NULL,
  `char_needed_exp` int(32) NOT NULL,
  `char_level` int(32) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;