<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
     <!-- trabalhando com caracter especial -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>DesafioDev</title>
</head>
<body>
        <div>
        <h2 id="titulo">Informações básicas</h2>
        <?php
        //imprimindo o valor da variavel (mensagem de user cadastrado)
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
        ?>
    </div>
    <!-- direcionando pag para processa -->
    <form method="post" action="processa.php">
            <div class="campo">
                <label for="nome">Nome</label> 
                <input type="text" name="nome" placeholder="Digite seu nome" id="nome" required>    
            </div>
            <br>
            <div class="campo">
                <label for="email">Email</label> 
                <input type="email" name="email" placeholder="Digite seu e-mail" id="email" required>   
            </div>
            <br>
            <br>
            <div>
                <button id="button" type="submit">Salvar</button>
            </div>
    </form>    
</body>
</html>