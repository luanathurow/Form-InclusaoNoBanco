<?php

session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Verifica se o email já está cadastrado no banco de dados
$result_email = "SELECT id FROM usuarios WHERE email='$email'";
$resultado_email = mysqli_query($conn, $result_email);

if (mysqli_num_rows($resultado_email) == 0) {
  // Insere o novo usuario caso o email nao esteja cadastrado
  $result_usuario = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  //Validacao para verificar se foi inserido um novo id na tabela, caso tenha sido inserido, o usuario foi cadastrado com sucesso
  if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>"; 
    header("Location: index.php");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location: index.php");
  }
} else {
  // Retorna uma mensagem de avisando que o email ja esta cadastrado
  $_SESSION['msg'] = "<p style='color:red;'>Este email já está cadastrado no sistema</p>";
  header("Location: index.php");
}
