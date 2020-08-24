<?php

function DataBR2US($D){
    if($D == "")
        return "";

    $v = explode("/", $D);

    if(sizeOf($v) == 3){
        $Data = $v[2] . "-" . $v[1] . "-" . $v[0];
        return $Data;
    }else{
        return false;
    }
}

function DataUS2BR($D){
    if($D == "")
        return "";

    $v = explode("-", $D);
    if(sizeOf($v)==3){
        $Data = $v[2] . "/" . $v[1] . "/" . $v[0];
        return $Data;
    }else{
        return false;
    }

}

function ValidaData($data){
    if (!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $data))
        return false;

    $data = explode("/","$data");
    $d = $data[0];
    $m = $data[1];
    $y = $data[2];

    $data = checkdate($m,$d,$y);
    if ($data == 1){
       return true;
    } else {
       return false;
    }
}

function ValidaHora($Hora) {
    $H = explode(":", $Hora);

    if((sizeOf($H) != 2) && (sizeOf($H) != 3))
        return false;

    if($H[0] < 0 || $H[0] > 23)
        return false;

    if($H[1] < 0 || $H[1] > 59)
        return false;

    if(isset($H[2])) {
        if($H[2] < 0 || $H[2] > 59)
        return false;
    }

    return true;
}

function DataHoraBR2US($D){
    $D = trim($D);
    if($D == "")
        return false;

    $v = explode(" ", $D);

    if(strlen($D) == 10)
        return DataBR2US($D) . " 00:00:00";

    return DataBR2US($v[0]) . " " . $v[1];
}

function DataHoraUS2BR($D){
	if(trim($D) == "")
		return "";

    $v = explode(" ", $D);

    $Hora = "";
    if(sizeOf($v)>1){
    $Hora = $v[1];
    $v = explode("-", $v[0]);
    }

    $Data = @$v[2] . "/" . @$v[1] . "/" . $v[0];

    return $Data . " " . $Hora;

  }

?>