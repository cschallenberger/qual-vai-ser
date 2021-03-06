<?php
session_start();
require_once "class/EstabelecimentoDAO.class.php";
require_once "class/Estabelecimento.class.php";
require_once "class/Cardapio.class.php";
require_once "class/CardapioDAO.class.php";
require_once "class/Conexao.class.php";

$estabelecimentoDAO = new EstabelecimentoDAO();
$todosEstabelecimentos = $estabelecimentoDAO->obterTodos();
if (isset($_SESSION['tipo'])){
    if($_SESSION['tipo'] == 1){
      header("location: index.php");
    }
}else{
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Locais</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style-portfolio.css">
  <link rel="stylesheet" href="css/picto-foundry-food.css" />
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="icon" href="favicon-1.ico" type="image/x-icon">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
  <script type="text/javascript" src="js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
  <script type="text/javascript" src="js/main.js" ></script>
</head>

<body>
  <?php include_once('headerAdmin.php');?>
  <div id="top" class="starter_container4 bg">
    <div class="follow-container">
      <div class="col-md-11">
        <div style="padding-top:120px">
          <h3 >GERÊNCIA DE ESTABELECIMENTOS</h3>
          <div class="form" style="width: 80%;margin:auto;justify-content:left;color:gray;opacity: 0.9;filter: Alpha(opacity=50);border-radius:10px">
            <form name="contatoForm"  action="alteraStatus.php" method="post">
              <div class="container1">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item active">
                    <a style="text-decoration: none" class="nav-link navactive" data-toggle="tab" href="#part1" role="tab">Pendentes</a>
                  </li>
                  <li class="nav-item">
                    <a style="text-decoration: none" class="nav-link" data-toggle="tab" href="#part2" role="tab">Aprovados</a>
                  </li>
                </ul>
              </div>
              <div class="container2">
                <div class="tab-content">
                  <div class="tab-pane active" id="part1" role="tabpanel">
                    <table class="table table-stripped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nome do Estabelecimento</th>
                          <th>Endereço</th>
                          <th>Informações/Cardápio</th>
                          <th>Ação</th>
                        </tr>
                      </thead>
                      <?php foreach ($todosEstabelecimentos as $estabelecimento) {
                        if ($estabelecimento->getStatus() == 'Pendente'){?>
                          <tbody>
                            <tr>
                              <td ><?php echo $estabelecimento->getIdEstabelecimento(); ?></td>
                              <td><?php echo $estabelecimento->getNome(); ?></td>
                              <td><?php echo $estabelecimento->getRua(); ?></td>
                              <td><button style="height: 28px !important; border: none !important;" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $estabelecimento->getIdEstabelecimento(); ?>">Mais informações</button></td>
                              <td>
                                <a class="aprovar" href="alteraStatus.php?id=<?php echo $estabelecimento->getIdEstabelecimento(); ?>/Aprovado" style="color:white">Aprovar</a>
                              </td>
                              <td>
                                <a class="reprovar" href="alteraStatus.php?id=<?php echo $estabelecimento->getIdEstabelecimento(); ?>/Reprovado" style="color:white">Reprovar</a>
                              </td>
                              <?php } }?>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-pane form-group" id="part2" role="tabpanel">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nome do Estabelecimento</th>
                              <th>Endereço</th>
                              <th>Informações/Cardápio</th>
                              <th>Ação</th>
                            </tr>
                          </thead>
                          <?php foreach ($todosEstabelecimentos as $estabelecimento) {
                            if ($estabelecimento->getStatus() == 'Aprovado'){?>
                              <tbody>
                                <tr>
                                  <td><?php echo $estabelecimento->getIdEstabelecimento(); ?></td>
                                  <td><?php echo $estabelecimento->getNome(); ?></td>
                                  <td><?php echo $estabelecimento->getRua(); ?></td>
                                  <td></td>
                                  <td>
                                    <a class="reprovar" href="alteraStatus.php?id=<?php echo $estabelecimento->getIdEstabelecimento(); ?>/Reprovado" style="color:white">Reprovar</a>
                                  </td>
                                  <?php }} ?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Inicio Modal Cardápios -->
          <div class="modal fade" id="myModal<?php echo $estabelecimento->getIdEstabelecimento(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h2 class="modal-title text-center" id="myModalLabel"><?php echo $estabelecimento->getNome();?></h2>
                      </div>
                      <div class="modal-body">
                          <p><?php echo "<b>Descrição:</b> " . $estabelecimento->getDescricao(); ?></p>
                          <?php $idEstb = $estabelecimento->getIdEstabelecimento(); ?>
                          <?php $obDAO = new CardapioDAO(); ?>
                          <?php $cardapio = $obDAO->obterCardapioEstabelecimento($idEstb); ?>
                          <?php foreach ($cardapio as $c) {  ?>
                              <hr>
                              <?php $dia = $c->getDia();

                              switch ($dia) {
                                  case 1:
                                  $diaText = "Domingo";
                                  break;
                                  case 2:
                                  $diaText = "Segunda";
                                  break;
                                  case 3:
                                  $diaText = "Terça";
                                  break;
                                  case 4:
                                  $diaText = "Quarta";
                                  break;
                                  case 5:
                                  $diaText = "Quinta";
                                  break;
                                  case 6:
                                  $diaText = "Sexta";
                                  break;
                                  case 7:
                                  $diaText = "Sabado";
                                  break;
                              }
                              echo "<b>" . $diaText . "</b>" . ": " . $c->getDescricao();
                              ?><br><?php


                          } ?>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Fim Modal -->


        </body>

        </html>
