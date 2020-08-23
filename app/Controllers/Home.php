<?php 

	namespace App\Controllers;
	use App\Models\PessoaModel;
	include APPPATH . "Libraries/Funcoes.php";

class Home extends BaseController{
	
	public function index(){
		
		$Model = new PessoaModel();
		$data['Pessoa'] = $Model->pessoaDaSessao();
		
		if(!is_object($data['Pessoa'])){
			$data['menu'] = false;
			echo view('templates/Cabecalho', $data);
			echo view('templates/Login', $data);
			echo view('templates/Rodape', $data);
		}else{
			$data['menu'] = true;
			echo view('templates/Cabecalho', $data);
			echo view('templates/Menu', $data);
			echo view('templates/Principal', $data);
			echo view('templates/Rodape', $data);
		}
	
	}

	public function login(){

		$Model = new PessoaModel();
		$erro = true;

		if($this->request->getMethod() === 'post' && $this->validate([
            'login' => 'required|min_length[4]|max_length[255]',
            'senha'  => 'required|min_length[3]'])){
			if($Model->login($this->request->getPost("login"),$this->request->getPost("senha"))){
				GoToURL("/");
				$erro = false;
			}else{
				$msgErro = "Login ou senha incorretos. Por favor verifique e tente novamente.";
			}
		}else{
			$msgErro = "Login ou senha inválidos. Por favor tente novamente.";
		}

		if($erro){
			$data["erro"] = true;
			$data["login"] = $this->request->getPost("login");
			$data["msgErro"] = $msgErro;
			echo view('templates/Cabecalho', $data);
			echo view('templates/Login', $data);
			echo view('templates/Rodape', $data);
		}

	}

	public function sair(){
		$session = \Config\Services::session();
		$session->remove("sessao");
		GoToURL("/");
	}

}