<div id='contenedor_menu'>
    <ul id='menu'>
        <li style='padding-left:10px;position:relative;' onClick="javascript:location.href = '<?php echo base_url();?>'">
            <div class='contenedor_menu'>
                <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Home.png' align='left'></div>
                <div class='texto_menu'><span>Início</span></div>
            </div>
        </li>

        <li style='padding-left: 10px;position: relative' onClick="javascript:afmenu('cadastro')">
            <div class='contenedor_menu'>
                <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Cadastro_Base.png' align='left'></div> 
                <div class='texto_menu'><span>Cadastro</span></div>
                <img id='imagem_menu_cadastro' src='<?php echo base_url();?>/imagens/seta_menu.png' class='seta_menu'>
            </div>
        </li>

        <?php 

            $style =  "style='display:none'";

            if((strpos($_SERVER["REQUEST_URI"],"cadastrar") !== FALSE) || (strpos($_SERVER["REQUEST_URI"],"salvar") !== FALSE)){
                $style = "";
            }
        
        ?>

        <ul id='contenedor_menu_cadastro' <?php echo $style ?>>
            <li style='padding-left:20px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("pessoa/cadastrar");?>'">
                <div class='contenedor_menu'>
                    <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Pessoa.png' align='left'></div>
                    <div class='texto_menu'><span>Pessoa</span></div>
                </div>
            </li>
            <li style='padding-left:20px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("apontamento/cadastrar");?>'">
                <div class='contenedor_menu'>
                    <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Apontamento.png' align='left'></div>
                    <div class='texto_menu'><span>Apontamento</span></div>
                </div>
            </li>
        </ul>

        <li style='padding-left: 10px;position: relative' onClick="javascript:afmenu('listar')">
            <div class='contenedor_menu'>
                <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Lista.png' align='left'></div> 
                <div class='texto_menu'><span>Listar</span></div>
                <img id='imagem_menu_listar' src='<?php echo base_url();?>/imagens/seta_menu.png' class='seta_menu'>
            </div>
        </li>

        <?php 

            $style =  "style='display:none'";

            if(strpos($_SERVER["REQUEST_URI"],"listar") !== FALSE){
                $style = "";
            }
        
        ?>

        <ul id='contenedor_menu_listar' <?php echo $style ?>>

            <li style='padding-left:10px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("pessoa/listar");?>'">
                <div class='contenedor_menu'>
                    <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Pessoa.png' align='left'></div>
                    <div class='texto_menu'><span>Pessoas</span></div>
                </div>
            </li>


            <li style='padding-left:10px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("apontamento/listar");?>'">
                <div class='contenedor_menu'>
                    <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Apontamento.png' align='left'></div>
                    <div class='texto_menu'><span>Apontamentos</span></div>
                </div>
            </li>

        </ul>

        <li style='padding-left:10px;position:relative;' onClick="javascript:if(confirm('Tem certeza que deseja sair do sistema?'))location.href = '<?php echo base_url("home/sair");?>'">
            <div class='contenedor_menu'>
                <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Sair.png' align='left'></div>
                <div class='texto_menu'><span>Sair</span></div>
            </div>
        </li>

    </ul>
</div>
<DIV id='meio'>

<script>

    function afmenu(id){

        if(objeto("contenedor_menu_" + id).style.display == "none"){
			objeto("imagem_menu_" + id).src = "<?php echo base_url();?>/imagens/seta_menu_ativo.png";
		}else{
			objeto("imagem_menu_" + id).src = "<?php echo base_url();?>/imagens/seta_menu.png";
		}

		$("#contenedor_menu_" + id).slideToggle();

    }

</script>