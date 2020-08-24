<?php

    echo "<div id='titulo_pagina'>Apontamentos</div>";

    if(@$Sucesso != ""){
        echo $Sucesso;
    }
        
    if(count($Apontamentos) > 0){
        
        echo "<table class='listbox' align='center'>
                <THEAD>
                    <TR>
                        <th>Id</th>
                        <th>Data/Hora Cadastro</th>
                        <th>Cadastrado por</th>
                        <th>Data</th>
                        <th>Hora Chegada</th>
                        <th>Hora Saída Almoço</th>
                        <th>Hora Retorno Almoço</th>
                        <th>Hora Saída</th>
                    </tr>
                </thead>
                <TBODY>";
        
        foreach($Apontamentos as $Apontamento){

            $url = "/apontamento/editar/" . $Apontamento["id"];

            echo "<tr>
                    <td onclick=\"document.location='$url'\">" . $Apontamento['id'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . DataHoraUS2BR($Apontamento['dataHoraInsercao']) . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Apontamento['nome'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . DataUS2BR($Apontamento['data']) . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Apontamento['horaChegadaEmpresa'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Apontamento['horaSaidaAlmoco'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Apontamento['horaRetornoAlmoco'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Apontamento['horaSaidaEmpresa'] . "</td>
                </tr>";

        }

        echo "<TFOOT><TR><TD colspan='1000'>Foram encontrados $totalBusca resultados.</TD></TR></TFOOT></table>";

    }

?>