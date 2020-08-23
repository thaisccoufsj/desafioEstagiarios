<?php

    echo "<div id='titulo_pagina'>Pessoas</div>";
    
    if(count($Pessoas) > 0){
        
        echo "<table class='listbox' align='center'>
                <THEAD>
                    <TR>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Usuário</th>
                    </tr>
                </thead>
                <TBODY>";
        
        foreach($Pessoas as $Pessoa){

            $url = "/pessoa/editar/" . $Pessoa["idPessoa"];

            echo "<tr>
                    <td onclick=\"document.location='$url'\">" . $Pessoa['idPessoa'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Pessoa['nome'] . "</td>
                    <td ondblClick=\"document.location='$url'\">" . $Pessoa['usuario'] . "</td>
                 </tr>";

        }

        echo "<TFOOT><TR><TD colspan='1000'>Foram encontrados $totalBusca resultados.</TD></TR></TFOOT></table>";

    }

?>