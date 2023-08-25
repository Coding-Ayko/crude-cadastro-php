<?php
  // print_r($_REQUEST) 
  if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
  //Se existir a variável post submit no banco se dados então acessa a página, esses && !empty($_POST['algumacoisa'] diz que o campo alguma coisa não pode tá vazio tbm
  {
    include_once('config.php');
    $email = $_POST ['email'];
    $senha = $_POST ['senha'];

    // print_r('E-mail: ' . $email);
    // print_r('Senha: ' . $senha); 

    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
    // -> vai verificar se os dados estão no banco hehe

    $result = $conexao -> query($sql);
    //executa o resultado no banco de dados 

    // print_r($result); 
    //-> teste de banco
    //exibe: -> mysqli_result Object ( [current_field] => 0 [field_count] => 10 [lengths] => [num_rows] => 1 [type] => 0 )
    // basicamente ele exibe que o resultado da query, encontra 1 linha que TEM esses dados, se não terá 0 

    if(mysqli_num_rows($result) < 1){
      // se na consulta do $resultado no sql, o numero de linhas for menor que 1 então: 
        // print_r('');
        $erro = "Credenciais inválidas. Por favor, verifique seu e-mail e senha.";
        // echo "tatata";
        //Se não achar ele volta para a pagina de login
    } 
    else {
      header('Location: sistema.php');
        exit;
    } 
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









?>