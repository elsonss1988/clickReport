<?php
//session_start();
//error_reporting(0); # usar em PROD
date_default_timezone_set('America/Sao_Paulo');
# sanitize function
include('../controlls/sanitize.php');


var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $varjs=$_POST['campo1'];
}

$obj->id=$_POST['id'];
$obj->name=$_POST['nome'];
$obj->email=$_POST['email'];
$obj->material=$_POST['material'];
$obj->time=$_POST['timestamp'];


print_r($obj);

isset($_SESSION['liveName'])?$liveName= $_SESSION['liveName']:$liveName='DigitalSolvers';

$dirLiveName=clean($liveName);

$dirAPI=dirname(__FILE__).'/reportsClick/'.$dirLiveName;

if(!is_dir(dirname(__FILE__).'/reportsClick/'.$dirLiveName)){
    mkdir(dirname(__FILE__).'/reportsClick/'.$dirLiveName,0755,true);     
}



try {
    $fileJson = fopen("./reportsClick/$dirLiveName/$dirLiveName".".json", "a+") or die("Unable to open file!");
    fwrite($fileJson,(json_encode(utf8ize($obj))).';');
    print_r(json_encode(utf8ize($obj)));
    
    if (!$fileJson) {
        throw new Exception("Could not open the file!");
    }
    
    # Bloco de Falha se houver no momento da gravacao.    
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    $fileLog = fopen("log.txt", "a+") or die("Unable to open file!");
    fwrite($fileLog,"O ID".$id." falhou no envio ás ".date("h:i:sa")."\n");
    fclose($fileLog);
}fclose($fileJson);


/***********************************************
 * Campo de funcoes auxiliares 
 * Normalize JSON
 ***********************************************/
 
 
// normalize json
function utf8ize($mixed){
    if(is_array($mixed)){
        foreach($mixed as $key=>$value){
            $mixed[$key]=utf8ize($value);
        }
    }elseif(is_string($mixed)){
        return mb_convert_encoding($mixed,"UTF-8","UTF-8");
    }
        return $mixed;
    }// endnormalize json
    
    
?>