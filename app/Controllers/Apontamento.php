<?php

    namespace App\Controllers;
    use App\Models\ApontamentoModel;
    use App\Models\PessoaModel;
    use \stdClass;
    include APPPATH . "Libraries/Essenciais.php";

    class Apontamento extends BaseController{

        var $Pessoa = false;

        public function __construct(){
            helper('form');
            $PessoaModel = new PessoaModel();
            $this->Pessoa = $PessoaModel->pessoaDaSessao();
        }

        public function cadastrar(){
            
            $data['menu'] = true;
            $data['Pessoa'] = $this->Pessoa;
            
            if(!$data['Pessoa']){
                GoToURL('/');
            }

            echo view('templates/Cabecalho',$data);
            echo view('templates/Menu');
			echo view('Cadastro/Apontamento',$data);
            echo view('templates/Rodape',$data);
        }

        public function salvar(){

            $Apontamento = new stdClass();
            $Apontamento->id = $this->request->getPost("id");
            $Apontamento->idPessoa = $this->request->getPost("idPessoa");
            $Apontamento->data = $this->request->getPost("data");
            $Apontamento->horaChegadaEmpresa = $this->request->getPost("horaChegadaEmpresa");
            $Apontamento->horaSaidaEmpresa = $this->request->getPost("horaSaidaEmpresa");
            $Apontamento->horaSaidaAlmoco = $this->request->getPost("horaSaidaAlmoco");
            $Apontamento->horaRetornoAlmoco = $this->request->getPost("horaRetornoAlmoco");
            $Apontamento->dataHoraInsercao  = $this->request->getPost("dataHoraInsercao ");
            $data['Apontamento'] = $Apontamento;
            $data['Pessoa'] = $this->Pessoa;
            $mensagem = "";

            if($this->request->getMethod() === 'post' && $this->validate("apontamento")){

                $date = DataBR2US($Apontamento->data);

                if(("$date $Apontamento->horaChegadaEmpresa" > date('Y-m-d H:i')) || 
                   ("$date $Apontamento->horaSaidaEmpresa" > date('Y-m-d H:i')) ||
                   ("$date $Apontamento->horaSaidaAlmoco" > date('Y-m-d H:i')) ||
                   ("$date $Apontamento->horaRetornoAlmoco" > date('Y-m-d H:i')) ){
                    $mensagem = "Não é possível que um apontamento tenha um horário futuro.";
                }else{
                    $Model = new ApontamentoModel();
                    if($Model->salvar($Apontamento)){
                        $data['menu'] = true;
                        $data['mensagem'] = "Os dados do apontamento foram salvos com sucesso.";
                        $data['Modo'] = "Editar";
                        $data['Apontamento']->id = $Model->idApontamento;
                        $data['Apontamento']->dataHoraInsercao = $Model->dataHoraInsercao;
                        echo view('templates/Cabecalho',$data);
                        echo view('templates/Menu');
                        echo view('Cadastro/Apontamento',$data);
                        echo view('Dialogos/Sucesso',$data);
                        echo view('templates/Rodape',$data);
                        return;
                    }else{
                    $mensagem = $Model->msgErro;
                    }
                }
            }else{
                $mensagem = errosToString($this->validator->getErrors());
            }

            $data['menu'] = true;
            $data['mensagem'] = $mensagem;
            echo view('templates/Cabecalho',$data);
            echo view('templates/Menu');
            echo view('Cadastro/Apontamento',$data);
            echo view('Dialogos/Erro',$data);
            echo view('templates/Rodape',$data);

        }

        public function listar(){
            $Model = new ApontamentoModel();
            $data['menu'] = true;
            $data['Modo'] = "Listar";
            $data['Apontamentos'] = $Model->listarApontamentos($this->Pessoa);
            $data['totalBusca'] = $Model->totalBusca;
            $data['Pessoa'] = $this->Pessoa;
            echo view('templates/Cabecalho',$data);
            echo view('templates/Menu');
            echo view('Listagem/Apontamento',$data);
            
            if(count($data['Apontamentos']) == 0){
                $data['mensagem'] = "Nenhum apontamento encontrado para a busca.";
                echo view('Dialogos/Sugestao',$data);
            }

            echo view('templates/Rodape',$data);
        }

        public function editar($idApontamento){
            $Model = new ApontamentoModel();
            $data['menu'] = true;
            $data['Modo'] = "Editar";
            $data['Apontamento'] = $Model->carregarApontamento($idApontamento,$this->Pessoa);
            $data['Pessoa'] = $this->Pessoa;
            echo view('templates/Cabecalho',$data);
            echo view('templates/Menu');
			echo view('Cadastro/Apontamento',$data);
            echo view('templates/Rodape',$data);
        }

        public function excluir($id){
            $Model = new ApontamentoModel();
            if($Model->excluir($id)){
                $data['menu'] = true;
                $data['Modo'] = "Listar";
                $data['Apontamentos'] = $Model->listarApontamentos(1,$this->Pessoa);
                $data['totalBusca'] = $Model->totalBusca;
                $data['Pessoa'] = $this->Pessoa;
                $data['mensagem'] = "O apontamento foi excluído com sucesso.";
                $data['Sucesso'] = view('Dialogos/Sucesso',$data);
                echo view('templates/Cabecalho',$data);
                echo view('templates/Menu');
                echo view('Listagem/Apontamento',$data);
                
                if(count($data['Apontamentos']) == 0){
                    $data['mensagem'] = "Nenhum apontamento encontrado para a busca.";
                    echo view('Dialogos/Sugestao',$data);
                }
    
                echo view('templates/Rodape',$data);
            }else{
                
                $data['mensagem'] = $Model->msgErro;

                if($Model->msgErro == "")
                    $data['mensagem'] = "Ocorreu um erro ao excluir o apontamento. Por favor tente novamente.";

                $data['menu'] = true;
                $data['Modo'] = "Editar";
                $data['Pessoa'] = $this->Pessoa;
                $data['Apontamento'] = $Model->carregarApontamento($id);
                echo view('templates/Cabecalho',$data);
                echo view('templates/Menu');
                echo view('Cadastro/Apontamento',$data);
                echo view('Dialogos/Erro');
                echo view('templates/Rodape',$data);

            }
            
        }

    }

?>