<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/hand.png" type="image/x-icon">
    <link rel="stylesheet" href="style/main.css"> 

    <!-- Responsividade -->
    <link rel="stylesheet" href="style/responsive.css">

    <!-- Bootstrap CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="node_modules/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>PlanoContas</title>
</head>
<body>
    <!-- Menu de Navegação - Nav bar -->
    <header>
        <nav>
            <a class="logo"href="#"><img class="img-logo" src="img/hand.png" alt="PlanoContas Logo"> | PlanoContas</a>
            <a class="navbar-btn" href="#">Entrar</a>
        </nav>
    </header>
    <!-- Principal em 2 sections -->
    <div id="container">
        <section id="about">
          <div class="text">
            <p>Está com várias contas em mãos? Percebe que a todo momento é preciso se lembrar quais foram pagas ou não? Gostaria de uma solução?</p>
            <p>A plataforma PlanoContas é essa <span>solução</span>!</p>
            <p>Vantagens ao utilizar PlanoContas:</p>
            <p><img class="img-check" src="img/checkmark.png" alt="Check"> Organização</p>
            <p><img class="img-check" src="img/checkmark.png" alt="Check"> Otimização</p>
          </div>
        </section>

        <section id="register">
          <form action="" method="POST" id="form">
            <div class="form">
              <h4>Cadastre-se ao PlanoContas</h4>
              <div id="alert"></div>
              <div class="group">
                <input type="text" name="" id="nameid" required><span class="barra"></span>
                <label for="nameid">Nome</label>
              </div>

              <div class="group">
                <input type="email" name="" id="emailid" required><span class="barra"></span>
                <label for="emailid">Email</label>
              </div>

              <div class="group">
                <input type="password" name="" id="passwordid" required><span class="barra"></span>
                <label for="passwordid">Senha</label>
              </div>

              <button type="submit" id="btnregister">Registrar-se</button>
            </div>
          </form>
        </section>
    </div>
    
    <!-- Principal fetch -->
    <div id="container-fetch">
      <div id="fetch">
        <!-- Tabela com bootstrap -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody id="data-table"></tbody>
        </table>
      </div>
    </div>

 
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script>
    $("#btnregister").click(function (e) {
      e.preventDefault();
      var name = $("#nameid").val();
      var email = $("#emailid").val();
      var password = $("#passwordid").val();

      $.ajax({
        url: "insert.php",
        method: "POST",
        data: {
          name:name,
          email:email,
          password:password
        },
        success: function(data){
          fetch();
          $("#alert").html(data);  
        }
      });
      $("#form")[0].reset();
    });

    function fetch() {
      $.ajax({
        url: "fetch.php",
        method: "POST",
        success: function(data){
          $("#data-table").html(data);
        }
      });
    }
    fetch();
  </script>
</body>
</html>