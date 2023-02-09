SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tb_jogos` (
  `id` int(10) UNSIGNED NOT NULL,
  `jogo` varchar(45) NOT NULL,
  `anolancamento` char(45) NOT NULL,
  `tipodejogo` varchar(45) NOT NULL,
  `distribuidora` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_jogos` (`id`, `jogo`, `anolancamento`, `tipodejogo`, `distribuidora`) VALUES
(1, 'Resident Evil 4 Remake', '2023-03-25', 'Terror', 'Capcom'),
(2, 'Far Cry 6', '2021-09-06', 'Ação', 'Ubisoft'),
(9, 'Gta 5', '2013-09-13', 'Ação', 'Rockstar Games');

CREATE TABLE `usuario` (
  `codUsuario` int(11) NOT NULL,
  `loginUsuario` varchar(30) NOT NULL,
  `senhaUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`codUsuario`, `loginUsuario`, `senhaUsuario`) VALUES
(18, '123', '123'),
(19, 'henry', '123'),
(20, 'Henryy', '1234');


ALTER TABLE `tb_jogos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`);


ALTER TABLE `tb_jogos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `usuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
