<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class PessoaModel extends Model{
        protected $table = 'PESSOAS';
        protected $allowedFields = ['nome', 'usuario', 'senha','ultimo_acesso'];
        var $db;
        var $msgErro = "";
        var $idPessoa;
        var $totalBusca = 0;

        public function __contruct(){
            $this->db = \Config\Database::connect();
        }

        public function pessoaDaSessao(){
            $session = \Config\Services::session();

            if($session->has("sessao")){
                $builder = $this->db->table($this->table);
                $builder->where("sessao",$session->get("sessao"));
                $query = $builder->get();
                return $query->getRow();
            }else{
                return false;
            }

        }

        public function login($usuario,$senha){
            
            #Codifica a senha
            $senha = utf8_decode(urldecode(base64_decode($senha)));
	        $senha = sha1($senha);

            #Obtém id da pessoa
            $builder = $this->db->table($this->table);
            $builder->select("idPessoa");
            $builder->where("usuario",$usuario);
            $builder->where("senha",$senha);
            $query = $builder->get();
            $row = $query->getRow();

            if(!isset($row)){
                return false;
            }

            #Atualiza os dados da pessoa
            $idSessao = sha1(uniqid() . $usuario);
            $session = \Config\Services::session();
            $session->set("sessao",$idSessao);

            $builder = $this->db->table($this->table);
            $builder->set("sessao",$idSessao);
            $builder->set("ultimo_acesso",date("Y-m-d H:i:s"));
            $builder->where("idPessoa",$row->idPessoa);
            $builder->update();

            return true;

        }

        public function salvar($Pessoa){

            #Verifica se login da pessoa já é utilizada para outra pessoa
            $builder = $this->db->table($this->table);
            $builder->select("idPessoa");
            $builder->where("usuario",$Pessoa->usuario);

            if(@$Pessoa->idPessoa != ""){
                $builder->where("idPessoa <>",$Pessoa->idPessoa);
            }

            $query = $builder->get();
            $row = $query->getRow();
            
            if(isset($row)){
                $this->msgErro = "Um usuário com este usuário já existe. Por favor informe um diferente.";
                return false;
            }

            $builder = $this->db->table($this->table);
            
            foreach($Pessoa as $campo=>$valor){
                if($campo == "senha"){
                    $valor = sha1($valor);
                }
                
                if($campo != "idPessoa"){
                    $builder->set($campo,$valor);
                }
            }

            #Insere ou atualiza
            if(@$Pessoa->idPessoa != ""){
                $builder->where("idPessoa",$Pessoa->idPessoa);
                $this->idPessoa = $Pessoa->idPessoa;
                return $builder->update();
            }else{
                $result = $builder->insert();
                $this->idPessoa = $this->db->insertID();
                return $result;
            }


        }

        public function carregarPessoa($idPessoa){
            $builder = $this->db->table($this->table);
            $builder->where("idPessoa",$idPessoa);
            $query = $builder->get();
            return $query->getRow();
        }

        public function listarPessoas($pagina = 1){
            $itensPorPagina = 50;
            $builder = $this->db->table($this->table);
            $query = $builder->get();
            $this->totalBusca = $builder->countAllResults();
            $query->freeResult();
            
            $builder = $this->db->table($this->table);
            $builder->limit($itensPorPagina * ($pagina -1),$itensPorPagina);
            $query = $builder->get();
            return $query->getResultArray();
        }

    }

?>