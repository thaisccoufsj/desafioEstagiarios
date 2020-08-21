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

        <ul id='contenedor_menu_cadastro' style='display:none'>
            <li style='padding-left:20px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("pessoa/cadastro");?>'">
                <div class='contenedor_menu'>
                    <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Pessoa.png' align='left'></div>
                    <div class='texto_menu'><span>Pessoa</span></div>
                </div>
            </li>
            <li style='padding-left:20px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("apontamento/cadastro");?>'">
                <div class='contenedor_menu'>
                    <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Apontamento.png' align='left'></div>
                    <div class='texto_menu'><span>Apontamento</span></div>
                </div>
            </li>
        </ul>

        <li style='padding-left:10px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("apontamento/lista");?>'">
            <div class='contenedor_menu'>
                <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Lista_Apontamentos.png' align='left'></div>
                <div class='texto_menu'><span>Apontamentos</span></div>
            </div>
        </li>

        <li style='padding-left:10px;position:relative;' onClick="javascript:location.href = '<?php echo base_url("home/sair");?>'">
            <div class='contenedor_menu'>
                <div class='imagem_menu'><img src='<?php echo base_url();?>/imagens/Sair.png' align='left'></div>
                <div class='texto_menu'><span>Sair</span></div>
            </div>
        </li>

    </ul>
</div>

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