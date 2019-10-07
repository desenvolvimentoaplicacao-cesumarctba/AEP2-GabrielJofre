<?php
		include 'Pessoa.php';
		$pessoa = new Pessoa($_POST['nome'],$_POST['data_nascimento'],$_POST['peso'],$_POST['altura']);

		$pessoa->validaCPF($_POST['cpf']);	
		$pessoa->calculaIMC();
		$pessoa->calculaIdade();