<?php
	
	 class Pessoa
	 {
	 	public $nome;
	 	public $data_nascimento;
	 	public $peso;
	 	public $altura;
	 	public $cpf;
	 

	 public function __construct($nome,$data_nascimento,$peso,$altura) {

	 	$this->nome = $nome;
	 	$this->data_nascimento = $data_nascimento;
	 	$this->peso = $peso;
	 	$this->altura = $altura;

	 }

	 public function calculaIMC(){
	 	$imc = ($this->peso/($this->altura*$this->altura));
	 	if ($imc < 18.5) {
	 		$resultado = "Abaixo do peso";
	 	} elseif ($imc >= 18.5 && $imc < 24.9) {
	 		$resultado = "Peso Normal";
	 	} elseif ($imc >= 25 && $imc < 29.9) {
	 		$resultado = "sobrepeso";
	 	} elseif ($imc >= 30 && $imc < 34.9) {
	 		$resultado = "Obesidade grau 1";
	 	} elseif ($imc >= 35 && $imc < 39.9) {
	 		$resultado = "Obesidade grau 2";
	 	} else {
	 		$resultado = "Obesidade grau 3";
	 	}

	 	echo "{$this->nome} seu IMC é:$imc";
	 	echo "<br>";
	 	echo "faixa: $resultado";
	 	
	 }

	 public function calculaIdade(){
	 	$dn = new DateTime($this->data_nascimento);
	 	$agora = new DateTime();

	 	$idade = $agora->diff($dn);

	 	echo "<br>";
	 	echo "idade:$idade->y";


	 }

	 public function validaCPF($cpf){	
	 	$cpf = preg_replace('/[^0-9]/','',$cpf);

	 	$digitoA = 0;
	 	$digitoB = 0;

	 	for ($i	=0, $x= 10; $i <=8; $i++, $x--){ 
	 		$digitoA += $cpf[$i] * $x;
	 	}

	 	for ($i	=0, $x= 11; $i <=9; $i++, $x--){

	 		if (str_repeat(	$i,11) == $cpf) {

				echo "CPF Inválido"; 
				echo "<br>";
				break;

			} 		

	 		$digitoB += $cpf[$i] * $x;
	 	}

	 	$somaA = (($digitoA%11) < 2) ? 0 : 11-($digitoA%11);
	 	$somaB = (($digitoB%11) < 2) ? 0 : 11-($digitoB%11);

	 	if (($somaA != $cpf[9])  || ($somaB != $cpf[10])) {	

	 		echo "CPF Inválido";
	 		echo "<br>";
	 			
	 	} else {

	 		echo "CPF Válido";
	 		echo "<br>";
	 		$this->cpf = $cpf;
	 		
	 	}
	}
}