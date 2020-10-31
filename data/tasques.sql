CREATE TABLE `tasques` (
  `id` int(11) NOT NULL,
  `tasca` text NOT NULL,
  `borrat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tasques` (`id`, `tasca`, `borrat`) VALUES
(1, 'prova', 0),
(2, 'hola', 1);

ALTER TABLE `tasques`
  ADD PRIMARY KEY (`id`);
