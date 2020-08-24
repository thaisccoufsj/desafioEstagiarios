<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $pessoa = [
		"nome"  => "min_length[5]|required",
		"usuario" =>  "min_length[4]|required",
		"senha" => 	"min_length[6]|required"
	];

	public $pessoa_errors = [
		"nome" => [
			"required" => "Por favor informe seu nome.",
			"min_length" => "O nome deve conter no mínimo 5 caracteres"
		],
		"usuario" => [
			"required" => "Por favor informe o login de acesso ao sistema.",
			"min_length" => "O login deve conter no mínimo 4 caracteres"
		],
		"senha" => [
			"required" => "Por favor informe a senha.",
			"min_length" => "A senha deve conter no mínimo 6 caracteres"
		]
		];

	public $pessoaEdicao = [
		"nome"  => "min_length[5]|required",
		"usuario" =>  "min_length[4]|required"
	];
	
	public $pessoaEdicao_errors = [
		"nome" => [
			"required" => "Por favor informe seu nome.",
			"min_length" => "O nome deve conter no mínimo 5 caracteres"
		],
		"usuario" => [
			"required" => "Por favor informe o login de acesso ao sistema.",
			"min_length" => "O login deve conter no mínimo 4 caracteres"
		]
	];

	public $apontamento = [
		"data"  => "exact_length[10]|required",
		"horaChegadaEmpresa" =>  "exact_length[5]|required",
		"idPessoa" => 	"required"
	];

	public $apontamento_errors = [
		"data"  => [
			"exact_length" => "A data informada é inválida",
			"required" => "A data do apontamento deve ser informado"
		],
		"horaChegadaEmpresa" =>  [
			"exact_length" => "A hora de chegada na empresa é inválida",
			"required" => "Hora de chegada na empresa não informada"
		],
		"idPessoa" => 	[
			"required" => "A pessoa não foi informada"
		]
	];

}
