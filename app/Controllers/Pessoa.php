<?php

    namespace App\Controllers;
    use App\Models\PessoaModel;
    use \stdClass;
    include APPPATH . "Libraries/Funcoes.php";

    class Pessoa extends BaseController{

        public function __construct(){
            helper('form');
        }

        public function cadastrar(){
            $data['menu'] = true;
            echo view('templates/Cabecalho');
            echo view('templates/Menu');
			echo view('Cadastro/Pessoa');
            echo view('templates/Rodape',$data);
        }

        public function salvar(){

            $Model = new PessoaModel();
            $Pessoa = new stdClass();
            $Pessoa->idPessoa = $this->request->getPost("idPessoa");
            $Pessoa->nome = $this->request->getPost("nome");
            $Pessoa->usuario = $this->request->getPost("usuario");
            $Pessoa->senha = $this->request->getPost("senha");
            $data["Pessoa"] = $Pessoa;
            $mensagem = "";
            $grupoValidacao = "pessoa";

            if($Pessoa->idPessoa != "")
                $grupoValidacao .= "Edicao";
           
            if($this->request->getMethod() === 'post' && $this->validate($grupoValidacao)){
                $Model = new PessoaModel();
                if($Model->salvar($Pessoa)){
                    $data['menu'] = true;
                    $data['mensagem'] = "Os dados da pessoa foram salvos com sucesso.";
                    $data['Modo'] = "Editar";
                    $Pessoa->idPessoa = $Model->idPessoa;
                    echo view('templates/Cabecalho');
                    echo view('templates/Menu');
                    echo view('Cadastro/Pessoa',$data);
                    echo view('Dialogos/Sucesso',$data);
                    echo view('templates/Rodape',$data);
                    return;
                }else{
                   $mensagem = $Model->msgErro;
                   $Pessoa->senha = $this->request->getPost("senha");
                }
            }else{
                $mensagem = errosToString($this->validator->getErrors());
            }

            $data['menu'] = true;
            $data['mensagem'] = $mensagem;
            echo view('templates/Cabecalho');
            echo view('templates/Menu');
            echo view('Cadastro/Pessoa',$data);
            echo view('Dialogos/Erro',$data);
            echo view('templates/Rodape',$data);

        }

        public function listar($pagina = 1){
            $Model = new PessoaModel();
            $data['menu'] = true;
            $data['Modo'] = "Listar";
            $data['Pessoas'] = $Model->listarPessoas($pagina);
            $data['totalBusca'] = $Model->totalBusca;
            echo view('templates/Cabecalho');
            echo view('templates/Menu');
            echo view('Listagem/Pessoa',$data);
            
            if(count($data['Pessoas']) == 0){
                $data['mensagem'] = "Nenhuma pessoa encontrada para a busca.";
                echo view('Dialogos/Sugestao',$data);
            }

            echo view('templates/Rodape',$data);
        }

        public function editar($idPessoa){
            $Model = new PessoaModel();
            $data['menu'] = true;
            $data['Modo'] = "Editar";
            $data['Pessoa'] = $Model->carregarPessoa($idPessoa);
            unset($data['Pessoa']->senha);
            echo view('templates/Cabecalho');
            echo view('templates/Menu');
			echo view('Cadastro/Pessoa',$data);
            echo view('templates/Rodape',$data);
        }

    }

?>