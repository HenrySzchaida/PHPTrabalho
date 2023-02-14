SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `codigo_disciplina` varchar(3) NOT NULL,
  `nome_disciplina` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `turmas` (`id_turma`, `codigo_disciplina`, `nome_disciplina`, `ano`, `id_curso`) VALUES
(1, 'BDO', 'Banco de Dados', 2021, 1),
(2, 'BDO', 'Banco de Dados', 2022, 2),
(3, 'SOP', 'Sistemas Operacionais', 2021, 3),
(4, 'SOP', 'Sistemas Operacionais', 2022, 4),
(5, 'BDO', 'Banco de Dados', 2021, 3),
(6, 'DEW', 'Desenvolvimento Web', 2021, 3),
(7, 'SOP', 'Sistemas Operacionais', 2021, 4);


ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_curso2` (`id_curso`);


ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `turmas`
  ADD CONSTRAINT `fk_curso2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
