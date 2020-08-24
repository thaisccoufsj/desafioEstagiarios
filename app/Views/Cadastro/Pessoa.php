<?php 

    if(@$Modo == "")
        $Modo = "Adicionar";

    echo "<div id='titulo_pagina'><a href='/pessoa/listar'>Pessoas</a> :: $Modo</div>";
    echo form_open('/pessoa/salvar',['id'=>'formulario','method'=>'post']);
    echo "<div class='contenedor_campo' style='margin-bottom:10px;'>";
    echo form_label("Id","idPessoa",['style' => 'margin-right:2px']);
    echo form_label("*","",['style' => 'margin-right:5px;color:blue;']);
    echo form_input(['name' => 'idPessoa','id' => 'idPessoa','type' => 'text','style' => 'margin-right:10px;width: 100px; background-color: rgb(221, 221, 221);','maxlength' => '11','readonly' => '']);
    echo "</div><div class='contenedor_campo'>";
    echo form_label("Nome","nome",['style' => 'margin-right:2px;']);
    echo form_label("*","",['style' => 'margin-right:5px;color:red;']);
    echo form_input(["type" => 'text','name' => 'nome','id' => 'nome', 'maxlength' => "255",'style' => 'margin-right:10px;width:250px;']);
    echo "</div><div class='contenedor_campo'>";
    echo form_label("Usuário","usuario",['style' => 'margin-right:2px;']);
    echo form_label("*","",['style' => 'margin-right:5px;color:red;']);
    echo form_input(["type" => 'text','name' => 'usuario','id' => 'usuario', 'maxlength' => "255",'style' => 'margin-right:10px']);
    echo "</div><div class='contenedor_campo'>";
    echo form_label("Senha","senha",['style' => 'margin-right:2px']);

    if($Modo == "Adicionar"){
        echo form_label("*","",['style' => 'margin-right:5px;color:red;']);
    }

    echo form_input(["type" => 'password','name' => 'senha','id' => 'senha', 'maxlength' => "255",'style' => 'margin-right:10px']);
    echo "</div><div class='contenedor_campo' style='width:100%;'>";
    if($Modo != "Adicionar")
        echo form_input(["style" => 'margin-top:5px;float:right;margin-right:5px;','type' => 'button','onclick'=> "confirmarRedirecionamento('/pessoa/excluir/' + objeto('idPessoa').value,'e')",'value' => 'Excluir']);
    echo form_submit(["style" => 'margin-top:5px;float:right;margin-right:5px;','type' => 'button','onclick'=> "enviarFormulario('formulario')",'value' => 'Salvar']);
    echo form_input(["style" => 'margin-top:5px;float:right;margin-right:5px;','type' => 'button','onclick'=> "confirmarRedirecionamento('/pessoa/listar','l')",'value' => 'Voltar']);
    echo "</div></form>";

    if(is_object(@$Pessoa) && ($Modo != "Adicionar")){
        echo "<script>\n";
        foreach($Pessoa as $campo=>$valor){
            echo "objeto('$campo').value = '". esc($valor) . "';\n";
        }
        echo "</script>\n";
    }


?>  