<?php

    namespace App\Models;
    use CodeIgniter\Model;
    use App\Models\PessoaModel;

    class ApontamentoModel extends Model{

        protected $table = 'APONTAMENTOS';
        var $db;
        var $msgErro = "";
        var $idApontamento;
        var $totalBusca = 0;
        var $dataHoraInsercao;

        public function __contruct(){
            $this->db = \Config\Database::connect();
        }

        public function carregarApontamento($idApontamento){
            $builder = $this->db->table($this->table);
            $builder->select("APONTAMENTOS.*,PESSOAS.nome");
            $builder->join("PESSOAS","PESSOAS.idPessoa = APONTAMENTOS.idPessoa");
            $builder->where("id",$idApontamento);
            $query = $builder->get();
            return $query->getRow();
        }

        public function listarApontamentos($Pessoa){
            $builder = $this->db->table($this->table);
            $builder->select("APONTAMENTOS.*,PESSOAS.nome");
            $builder->join("PESSOAS","PESSOAS.idPessoa = APONTAMENTOS.idPessoa");
            $builder->where("PESSOAS.idPessoa",$Pessoa->idPessoa);
            $query = $builder->get();
            $this->totalBusca = $builder->countAllResults();
            return $query->getResultArray();
        }

        public function salvar($Apontamento){

            $builder = $this->db->table($this->table);
            
            foreach($Apontamento as $campo=>$valor){
                if(($campo != "id") && ($campo != '') && ($campo != 'dataHoraInsercao')){
                    if(ComecaCom($campo,"dataHora"))
                        $valor = DataHoraBR2US($valor);
                    else if(ComecaCom($campo,"data"))
                        $valor = DataBR2US($valor);
                     
                    $builder->set($campo,$valor);
                }
            }

            #Insere ou atualiza
            if(@$Apontamento->id != ""){
                $builder->where("id",$Apontamento->id);
                $this->idApontamento = $Apontamento->id;
                $this->dataHoraInsercao = $Apontamento->dataHoraInsercao; 
                return $builder->update();
            }else{
                $this->dataHoraInsercao = date("Y-m-d H:i:s");
                $builder->set("dataHoraInsercao",$this->dataHoraInsercao);
                $result = $builder->insert();
                $this->idApontamento = $this->db->insertID();
                return $result;
            }


        }

        public function excluir($id){
            $builder = $this->db->table($this->table);
            $builder->where("id",$id);
            return $builder->delete();
        }

    }

?>