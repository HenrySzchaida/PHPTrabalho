SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `alunos` (
  `id_jogo` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `anolancamento` char(45) NOT NULL,
  `tipojogo` varchar(45) NOT NULL,
  `id_curso` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `alunos` (`id_jogo`, `nome`, `anolancamento`, `tipojogo`, `id_curso`) VALUES
(7, 'Resident Evil 4 ', '2023-03-24', 'Terror', 4);

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cursos` (`id_curso`, `nome`) VALUES
(1, 'Ubisoft\r\n'),
(2, 'Rockstar Games\r\n'),
(3, 'EA'),
(4, 'CapCom');

CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id_usuario`, `nome`, `login`, `senha`) VALUES
(1, 'Sr. Administrador', 'admin', 'admin'),
(2, 'Sr. Root', 'root', 'root');


ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_jogo`),
  ADD KEY `fk_curso` (`id_curso`);

ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_matricula`),
  ADD UNIQUE KEY `uk_matriculas` (`id_aluno`,`id_turma`),
  ADD KEY `fk_turmas` (`id_turma`);

ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_curso2` (`id_curso`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uk_usuarios` (`login`);


ALTER TABLE `alunos`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);

ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_alunos` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_jogo`),
  ADD CONSTRAINT `fk_turmas` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`);

ALTER TABLE `turmas`
  ADD CONSTRAINT `fk_curso2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
