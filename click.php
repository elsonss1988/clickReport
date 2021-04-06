<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            session_start();
            $id=['1','13','26','17'];
            $nome=['Carlos','Alberto ','Roberto','Alves'];
            $email=['carlos@ds.com','alberto@rojo.com ','roberto@webevent.com','alves@consultorio.com'];
            $material=['infografico.png','book.pdf','marketing.mpg'];
            
            $_SESSION['id']='1';
            $_SESSION['nome']='Carlos';
            $_SESSION['email']='carlos@ds.com';
            $_SESSION['material']='infografico.png';
            
            
            $_SESSION['id']=$id[array_rand($id)];           // Provida da  API
            $_SESSION['nome']=$nome[array_rand($nome)];     // Privda  da  API
            $_SESSION['email']=$email[array_rand($email)];  // Provida da  API
            $_SESSION['material']=$material[array_rand($material)];  //Provida do Click
        ?>
        
         <h1>Click Test</h1>
         <button onclick='clickName(<?php echo '"'.$_SESSION['id'].'"'?>,<?php echo '"'.$_SESSION['nome'].'"'?>,<?php echo '"'.$_SESSION['email'].'"'?>,<?php echo '"'.$_SESSION['material'].'"'?>,<?php echo '"'.date('Y-m-d h:i:s').'"'?>)'> Record your Click </button>
        
        <script src="click.js"></script>
    </body>
</html>