<?php \Config\Services::validation()->listErrors(); ?>

<?php 

    if(@$erro){
       echo " <DIV id='diverro'>$msgErro</DIV>";        
    }

?>

<P align='center'>Seja bem-vindo(a) ao sistema de gerenciamento de apontamentos.<br> Informe seu login e senha para continuar, e ter acesso ao sistema.</P>

    <form id='formulario' action="/home/login" method="post">
        <?= csrf_field() ?>
        <TABLE class='panel' align='center'>
            <tbody id='fLogin'>
                <TR>
                    <TD>
                        Login
                    </TD>
                    <TD>
                        <input autocomplete='off' type='text' name='login' id='login'>
                    </TD>
                </TR>
                <TR>
                    <TD>
                        Senha
                    </TD>
                    <TD>
                        <input type='password' name='senha' id='senha'>
                    </TD>
                </TR>
                <tr>
                    <td colspan='2' align='center'>
                        <input type="button" value="Entrar" onclick='javascript:Autenticar()'>
                    </td>
                </tr>
            </tbody>
        </TABLE>
    </form>
	
<SCRIPT>

    <?php 

        if(@$login != ""){
            echo "objeto('login').value = '$login';
                  objeto('senha').focus();";
        }else{
            echo "objeto('login').focus();";
        }
    
    ?>

    function Autenticar(){
        objeto("senha").value = btoa(encodeURIComponent(objeto("senha").value));
        objeto("formulario").submit();
    }

	objeto("login").addEventListener("keypress",function(event){
		if ( event.which == 13 ) {
			Autenticar();
		}
	});

	objeto("senha").addEventListener("keypress",function(event){
		if ( event.which == 13 ) {
			Autenticar();
		}
	});

</SCRIPT>