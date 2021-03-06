<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Qual vai ser?</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style-portfolio.css">
    <link rel="stylesheet" href="css/picto-foundry-food.css" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="favicon-1.ico" type="image/x-icon">
    <link id="favicon" rel="shortcut icon" href="images/icone.png" type="image/png" />
</head>

<body>
    <?php if (isset($_SESSION['id_dono'])){
    				if($_SESSION['tipo'] == 0){
          			include_once('headerAdmin.php');
    				}else {
    					include_once('headerDonoEstabelecimento.php');
   		 		}
    		 }else{
            	include_once('header.php');
          }


    ?>

    <div id="top" class="starter_container bg">
        <div class="follow_container">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="top-title"> Qual vai ser?</h2>
                <h2 class="white second-title">"O melhor local para comer perto de você"</h2>
                <hr>
            </div>
        </div>
    </div>

    <!-- ============ About Us ============= -->

    <section id="about" class="description_content">
        <div class="text-content container">
            <div class="col-md-6">
                <h1>Sobre nós</h1>
                <div class="fa fa-cutlery fa-2x"></div>
                <p class="desc-text">Encontre o melhor local para comer perto de você. Pesquise pelo item de um cardápio e diremos quais locais possuem o que você deseja, exibindo pela ordem de proximidade.</p>
                <p class="desc-text">Deseja cadastrar seu estabelecimento? Clique na aba de cadastro e faça parte do nosso site!</p>
            </div>
            <div class="col-md-6">
                <div class="img-section">
                    <img src="images/kabob.jpg" width="250" height="220">
                    <img src="images/limes.jpg" width="250" height="220">
                    <div class="img-section-space"></div>
                    <img src="images/radish.jpg"  width="250" height="220">
                    <img src="images/corn.jpg"  width="250" height="220">
                </div>
            </div>
        </div>
    </section>



    <!-- ============ Social Section  ============= -->

    <section class="social_connect">
        <div class="text-content container">

        </div>
    </section>


    <!-- ============ Footer Section  ============= -->


    <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
    <script type="text/javascript" src="js/main.js" ></script>

</body>
</html>
