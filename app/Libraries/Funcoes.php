<?php

    function GoToURL($URL){
        die("<SCRIPT>document.location = '$URL';</SCRIPT>");
    }

    function errosToString($erros){
        
        $TXT = "";

        foreach ($erros as $erro){
            $TXT .= "$erro.<br>";
        }

        return preg_replace("/<br>$/","",$TXT);
    }

?>