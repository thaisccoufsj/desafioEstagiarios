<!doctype html>
<html>
<head>
    <title>Controle de Apontamentos</title>
    <link rel="icon" href="<?=base_url()?>/icone.ico" type="image/gif">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/Principal.css?Versao=<?php echo date("Ymd"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/Cabecalho.css?Versao=<?php echo date("Ymd"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/Menu.css?Versao=<?php echo date("Ymd"); ?>">
    <SCRIPT src='<?php echo base_url();?>/js/Funcoes.js?Versao=<?php echo date("Ymd"); ?>'></SCRIPT>
    <SCRIPT src='<?php echo base_url();?>/js/jquery-1.6.4.min.js'></SCRIPT>
</head>
<body>
    <DIV id='cabecalho'>
       <p>Controle de Apontamentos</p>
    </DIV>

	<div id='infologado' width='100%'>
        <?php 
        
            if(is_object(@$Pessoa)){
                echo "Logado como <font color='#FFFF00'>$Pessoa->nome</font>    - ";
            }
            
            echo date("d/m/Y");

        ?>
    </DIV>

