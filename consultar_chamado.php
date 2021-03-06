<?  require_once("validador_acesso.php");


 ?>
    
  <?php 

    //Array de chamados
    $chamados = array();

    //Abrindo o arquivo
    $arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');


    //enquanto houver registros(linhas) a serem recuperados
    while (!feof($arquivo)) { //Testa pelo fim de um arquivo
      $registro = fgets($arquivo);


      //Testa se o perfil logado é o esperado pela regra de exibição
      if ($_SESSION['perfil_id'] == 2) {
            // Só vamos exibir o chamado, se ele foi criado pelo usuário
              if($_SESSION['id'] == $registro[0]) {
                     $chamados[] = $registro; // incluindo as linhas do chamado no array de chamados
                    }
                  }  


                  //Se o perfil_id não atendeu o a regra ele exibe todos os chamados no array.
                  else {
                    $chamados[] = $registro;
                  }
    }

    //fechando o arquivo aberto
    fclose($arquivo);


   ?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="logoff.php">SAIR</a>
          </li>
        </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <? foreach($chamados as $chamado) { ?>

                <?php
                $chamados = explode('#', $chamado);

                if(count($chamados) < 3) {
                  continue;
                }

                ?>

                  <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamados[2]?></h6>
                  <p class="card-text"><?=$chamados[3]?></p>

                </div>
              </div>

            <? } ?>
              
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>