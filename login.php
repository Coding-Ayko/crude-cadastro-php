<!-- codigo php -->

<?php 
  include_once('config.php');
  $erro = "";
  // print_r($_REQUEST) 
  if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
  //Se existir a variável post submit no banco se dados então acessa a página, esses && !empty($_POST['algumacoisa'] diz que o campo alguma coisa não pode tá vazio tbm
  {
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
        //Se não achar ele volta para a pagina de login
    } 
    else {
      header('Location: sistema.php');
        exit;
    } 
   
  }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<!-- código html -->

<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário | Tatau</title>
  <link rel="stylesheet" href="login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Outfit:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <section class="login
    ">
    <div class="centralizer">
        <form  class="login-form" action="" method="post">
        <?php
        if (!empty($erro)) {
            echo '<p style="color: red;">' . $erro . '</p>';
            
        }
        ?>
          <h1>Entre na sua conta: </h1>
  
          <div class="inputBox">
            <input type="text" name="email" id="email" class="inputUser" required>
              <label for="email" class="labelinput">E-mail</label>
          </div>
          <div class="inputBox">
            <input type="password" name="senha" id="senha" class="inputUser" required>
            <label for="senha" class="labelinput">Senha</label>
          </div>
          <input type="submit" name="submit" id="submit" value="Entrar">
          <p>Ainda não possui cadastro? <a href="index.php">Cadastre-se!</a></p>
        </form>
        <div class="imglogin" >
              <img class="imglogin-img"  src="./15410.jpg" alt="" > 
        </div>
    </div>
  </section>
</body>

</html>

