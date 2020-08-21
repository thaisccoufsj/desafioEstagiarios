<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class PessoaModel extends Model{
        protected $table = 'PESSOAS';
        protected $allowedFields = ['nome', 'usuario', 'senha','ultimo_acesso'];
        var $db;

        public function __contruct(){
            $db = \Config\Database::connect();
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

    }

?>