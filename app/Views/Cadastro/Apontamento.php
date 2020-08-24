<?php

    if(@$Modo == "")
        $Modo = "Adicionar";

    echo "<div id='titulo_pagina'><a href='/apontamento/listar'>Apontamento</a> :: $Modo</div>";
    echo form_open('/apontamento/salvar',['id'=>'formulario','method'=>'post']);
    #Id do apontamento
    echo "<div class='contenedor_campo' style='margin-bottom:10px;'>";
    echo form_label("Id Apontamento","id",['style' => 'margin-right:2px']);
    echo form_label("*","",['style' => 'margin-right:5px;color:blue;']);
    echo form_input(['name' => 'id','id' => 'id','type' => 'text','style' => 'margin-right:10px;width: 100px; background-color: rgb(221, 221, 221);','maxlength' => '11','readonly' => '']);
    echo "</div><div class='contenedor_campo'>";
    
    #Data/Hora de cadastro
    echo form_label("Data/Hora Cadastro","dataHoraInsercao",['style' => 'margin-right:2px']);
    echo form_label("*","",['style' => 'margin-right:5px;color:blue;']);
    echo form_input(['name' => 'dataHoraInsercao','id' => 'dataHoraInsercao','type' => 'text','style' => 'margin-right:10px;width: 190px;background-color: rgb(221, 221, 221);','maxlength' => '19','readonly' =>'']);
    echo "</div><div class='contenedor_campo'>";
    
    #Pessoa
    echo form_input(['name' => 'idPessoa','id' => 'idPessoa','type' => 'text','style' => 'display:none;','value' => "$Pessoa->idPessoa"]);
    echo form_label("Pessoa","nomePessoa",['style' => 'margin-right:2px']);
    echo form_label("*","",['style' => 'margin-right:5px;color:blue;']);
    echo form_input(['name' => 'nomePessoa','id' => 'nomePessoa','type' => 'text','style' => 'margin-right:10px;width: 250px;background-color: rgb(221, 221, 221);','maxlength' => '255','readonly' => '',"value" => "$Pessoa->nome"]);
    echo "</div><div class='contenedor_campo'>";
    
    #Data do apontamento
    echo form_label("Data","data",['style' => 'margin-right:2px']);
    echo form_label("*","",['style' => 'margin-right:5px;color:red;']);
    echo form_input(['name' => 'data','id' => 'data','type' => 'text','style' => 'margin-right:10px;width: 110px; ','maxlength' => '11','onkeypress' => 'javascript:mascara(this, mascara_data)']);
    echo "</div><div class='contenedor_campo'>";

    #Hora de chegada na empresa
    echo form_label("Hora chegada","horaChegadaEmpresa",['style' => 'margin-right:2px']);
    echo form_label("*","",['style' => 'margin-right:5px;color:red;']);
    echo form_input(['name' => 'horaChegadaEmpresa','id' => 'horaChegadaEmpresa','type' => 'text','style' => 'margin-right:10px;width: 90px; ','size' => '9','onkeypress' => 'javascript:mascara(this, mascara_hora)']);
    echo "</div><div class='contenedor_campo'>";

    #Hora saída almoço
    echo form_label("Hora Saída Almoço","horaSaidaAlmoco",['style' => 'margin-right:2px']);
    echo form_input(['name' => 'horaSaidaAlmoco','id' => 'horaSaidaAlmoco','type' => 'text','style' => 'margin-right:10px;width: 90px; ','size' => '9','onkeypress' => 'javascript:mascara(this, mascara_hora)']);
    echo "</div><div class='contenedor_campo'>";

    #Hora chegada almoço
    echo form_label("Hora Retorno Almoço","horaRetornoAlmoco",['style' => 'margin-right:2px']);
    echo form_input(['name' => 'horaRetornoAlmoco','id' => 'horaRetornoAlmoco','type' => 'text','style' => 'margin-right:10px;width: 90px; ','size' => '9','onkeypress' => 'javascript:mascara(this, mascara_hora)']);
    echo "</div><div class='contenedor_campo'>";

    #Hora saída da empresa
    echo form_label("Hora Saída","horaSaidaEmpresa",['style' => 'margin-right:2px']);
    echo form_input(['name' => 'horaSaidaEmpresa','id' => 'horaSaidaEmpresa','type' => 'text','style' => 'margin-right:10px;width: 90px; ','size' => '9','onkeypress' => 'javascript:mascara(this, mascara_hora)']);
    echo "</div><div class='contenedor_campo' style='width:100%;'>";
    if($Modo != "Adicionar")
        echo form_input(["style" => 'margin-top:5px;float:right;margin-right:5px;','type' => 'button','onclick'=> "confirmarRedirecionamento('/apontamento/excluir/' + objeto('id').value,'e')",'value' => 'Excluir']);
        echo form_submit(["style" => 'margin-top:5px;float:right;margin-right:5px;','type' => 'button','onclick'=> "enviarFormulario('formulario')",'value' => 'Salvar']);
        echo form_input(["style" => 'margin-top:5px;float:right;margin-right:5px;','type' => 'button','onclick'=> "confirmarRedirecionamento('/apontamento/listar','l')",'value' => 'Voltar']);
    echo "</div></form>";
   
    if(is_object(@$Apontamento)){
        echo "<script>\n";
        foreach($Apontamento as $campo=>$valor){
            if(ComecaCom($campo,"dataHora") && (strpos($valor,"/") === FALSE))
                $valor = DataHoraUS2BR($valor);
            else if(ComecaCom($campo,"data") && (strpos($valor,"/") === FALSE))
                $valor = DataUS2BR($valor);
            else if(ComecaCom($campo,"hora"))
                $valor = substr($valor,0,5);
            echo "objeto('$campo').value = '". esc($valor) . "';\n";
        }
        echo "</script>\n";
    }

?>

<script>
$(function() {
    $('#data').datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>