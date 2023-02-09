<?php
	include("config.php");
	switch ($_REQUEST["acao"]) {
		case 'cadastrar':
			$sql = "INSERT INTO tb_jogos
						(jogo, anolancamento, tipodejogo, distribuidora)
					VALUES
						('".$_POST["jogo"]."','".$_POST["anolancamento"]."','".$_POST["tipodejogo"]."','".$_POST["distribuidora"]."')";

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='usuarios.php';</script>";
			}else{
				print "<script>alert('Não foi possível cadastrar.');</script>";
				print "<script>location.href='usuarios.php';</script>";
			}
			break;
		
		case 'editar':
			$sql = "UPDATE tb_jogos SET
						jogo='".$_POST["jogo"]."',
						anolancamento='".$_POST["anolancamento"]."',
						tipodejogo='".$_POST["tipodejogo"]."',
						distribuidora='".$_POST["distribuidora"]."'
					WHERE
						id=".$_POST["id"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='usuarios.php';</script>";
			}else{
				print "<script>alert('Não foi possível editar.');</script>";
				print "<script>location.href='usuarios.php';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM tb_jogos WHERE id=".$_REQUEST["id"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='usuarios.php';</script>";
			}else{
				print "<script>alert('Não foi possível excluir.');</script>";
				print "<script>location.href='usuarios.php';</script>";
			}
			break;
	}
?>