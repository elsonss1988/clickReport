<?php
include('../controlls/sanitize.php');

date_default_timezone_set('America/Sao_Paulo');
$_GET['name'];
echo $var_value;
# Variaveis
 $countLog=0;
 $j=0;
 $logs=[];
 $campos=[];
 $linha=[];
 $linhas=[];
 $arrayUser=[];
 $idfile='';
 $idcount=0;
 $file=[];
 $arrayToken=[];
 $offset;
 $dir = './reportsClick/';
 $j=0;
 
 $dirLive=$dir.clean($_GET['name']);
 //$dirLive=$dir.'DigitalSolvers';
 
 // echo $dirLive;
 $lives = scandir($dir); // show all folders in directory
 $files = scandir($dirLive); // show all files in directory
 $livesName=[];
 $k=0;
 

for($i=2;$i<count($lives);$i++){
    array_push($livesName,($lives[$i]));
}

// Loop  de leitura dos arquivos, leitura a partir do item 2 excluindo as leituras associadas ao diretorios (. e ..)
    for($i=2;$i<count($files);$i++){
        
        
    
        $file = file($dirLive."/".$files[$i]);    
        $arquivo = fopen ($dirLive."/".$files[$i], 'r');
        $pos = strpos($arquivo,time );
        $texto = fgets($arquivo);
        print_r(json_decode($texto));
        
        echo"[";

        $linha=explode(";",$texto);
        for($i;count($linha)-1>$i;$i++){
            echo "$linha[$i]";
            if(count($linha)-2>$i){
            echo ",";
            }
            array_push($linhas,$linha[$i]);
        } 
        
        echo"]";
        

    $dadoArray=explode("_",$files[$i]);
    
}

?>

