<?php 

    if($menu){
        echo "</div>";
    }

?>
</div>
<div id='rodape'>&copy; 2020</div>
<SCRIPT>

    window.setInterval(function(){
        var calc = $(window).height();
        objeto('mmmmm').style.minHeight = ($(window).height() - $('#rodape').outerHeight()) + 'px';
    }, 100);

</SCRIPT>
</body>
</html>