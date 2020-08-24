
function mascara(o,f){
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()",1);
}

function execmascara(){
  v_obj.value = v_fun(v_obj.value);
}

function mascara_datahora(v){
    v = v.replace(/([^0-9])/g, "");
    v = v.replace(/(..............)(.*)/, "$1");


    //Trata os valores válidos
      v = v.replace(/^([4-9])$/, "3");
      v = v.replace(/^([3][2-9])(.*)$/, "31$2");
      v = v.replace(/^([4-9][0-9])(.*)$/, "31$2");
      v = v.replace(/^(..)([2-9])$/, "$1 1");
      v = v.replace(/^(..)(1[3-9])$/, "$1 12");
      v = v.replace(/^(..)(00)$/,"$1 01");
      v = v.replace(/^(..)(..)(....)[3-9]$/, "$1 $2 $3 2");
      v = v.replace(/^(..)(..)(....)([2][4-9])$/, "$1 $2 $3 23");
      v = v.replace(/^(..)(..)(....)([2][4-9])$/, "$1 $2 $3 23");
      v = v.replace(/^(..)(..)(....)(..)([6-9])$/, "$1 $2 $3 $4 5");
      v = v.replace(/^(..)(..)(....)(..)(..)([6-9])$/, "$1 $2 $3 $4 $5 5");

    //Tira os espaços
      v = v.replace(/(\ )/g, "");
     //coloca / na data e : na hora
    v = v.replace(/^(..)(..)(....)(..)(..)(..)$/, "$1/$2/$3 $4:$5:$6");
    v = v.replace(/^(..)(..)(....)(..)(..)(.)$/, "$1/$2/$3 $4:$5:$6");
    v = v.replace(/^(..)(..)(....)(..)(..)$/, "$1/$2/$3 $4:$5");
    v = v.replace(/^(..)(..)(....)(..)(.)$/, "$1/$2/$3 $4:$5");
    v = v.replace(/^(..)(..)(....)(..)$/, "$1/$2/$3 $4");
    v = v.replace(/^(..)(..)(....)(.)$/, "$1/$2/$3 $4");
    v = v.replace(/^(..)(..)(....)$/, "$1/$2/$3");
    v = v.replace(/^(..)(..)(...)$/, "$1/$2/$3");
    v = v.replace(/^(..)(..)(..)$/, "$1/$2/$3");
    v = v.replace(/^(..)(..)(.)$/, "$1/$2/$3");
    v = v.replace(/^(..)(..)$/, "$1/$2");
    v = v.replace(/^(..)(.)$/, "$1/$2");

    return v;
}

function mascara_data(v){
    v = v.toLowerCase();

    v = v.replace(/^(..........)(.)*/, "$1");


    v = v.replace(/^([1-9])\//, "0$1/");

    v = v.replace(/^([0-3][1-9])\/([1-9])\//, "$1/0$2/");

    v = v.replace(/[^0-9]/g,"")                 //Remove tudo o que não é dígito

    v = v.replace(/^(\d\d)(\d)$/g,"$1\/$2")

    v = v.replace(/^(\d\d)(\d\d)$/g,"$1\/$2")

    v = v.replace(/^(\d\d)(\d\d)(\d)$/g,"$1\/$2\/$3")

    v = v.replace(/^(\d\d)(\d\d)(\d\d)$/g,"$1\/$2\/$3")

    v = v.replace(/^(\d\d)(\d\d)(\d\d\d)$/g,"$1\/$2\/$3")

    v = v.replace(/^(\d\d)(\d\d)(\d\d\d\d)$/g,"$1\/$2\/$3")

    v = v.replace(/00\//g,"01/")

    v = v.replace(/^3[2-9]/g, "31/")
    v = v.replace(/^[4-9][0-9]/g, "31/")

    v = v.replace(/^(..)\/00/g, "$1/01/")

    v = v.replace(/^(..)\/1[3-9]/g, "$1/12/")
    v = v.replace(/^(..)\/[2-9][0-9]/g, "$1/12/")

    return v
}

function mascara_hora(v){

	v = v.replace(/[^0-9\:]/g, "");

	v = v.replace(/^:/g, "00:");

	v = v.replace(/^(..)(\d)/g, "$1:$2");

	v = v.replace(/(.*)\:(.*)\:/, "$1:$2");

	v = v.replace(/(.....)(.*)/, "$1");

	v = v.replace(/\:\:/g, ":");

	v = v.replace(/\:(..)./g, ":$1");

	v = v.replace(/^(..)/, "$1:");

	v = v.replace(/^(.)\:/, "0$1:");

	v = v.replace(/^[2][4-9]/, "23");
	v = v.replace(/^[3-9][0-9]/, "23");

	v = v.replace(/\:[6][0-9]/, "59");
	v = v.replace(/\:[7-9][0-9]/, "59");


	v = v.replace(/\:\:/, ":");
	return v;
}