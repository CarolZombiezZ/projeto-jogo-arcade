<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io_souls/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io_souls/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io_souls/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>fighting Souls The Game</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Press Start 2P", cursive;
        }


        .gif {
            z-index: -1;
            position: absolute;
            padding-top: 7%;
            padding-left: 2%;
        }

        .tabela {
            text-align: center;
            padding-right: 1%;
            padding-left: 108%;
            padding-top: 30%;
            position: absolute;
        }


        .player1 {
            position: absolute;
            padding-top: 14%;
            font-size: 20px;
            color: aliceblue;
            padding-left: 6%;
        }

        .player2 {
            position: absolute;
            padding-top: 14%;
            font-size: 20px;
            color: aliceblue;
            padding-left: 84%;
        }

        canvas {
            padding-top: 7%;
            padding-left: 2%;
            
        }

        .botao {
            margin-left: 113%;
            margin-top: 40%;
            position: absolute;
        }

        .botao2 {
            margin-left: 115%;
            margin-top: 45%;
            position: absolute;
        }


        .background-container {
            position: absolute;
            width: 1366;
            height: 768;
            /* Define a altura do fundo */
            background: url(img/teste.gif) no-repeat center center;
            background-size: cover;
            z-index: 0;
            /* Garante que fique atrás dos outros elementos */
        }

        .fundo{position:absolute;
            padding-top: 7%;
            padding-left: 2%;
            z-index: -1;
        }
    </style>

</head>

<body background="img/solaire.jpg">



    <!-- Red container div -->
    <div style="position: relative; display:inline-block;">


        <div id=placar class="container tabela row">
            <div class="col-sm-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th id="player">Player</th>
                            <th id="vitoria">Vit</th>
                            <th id="empate">Emp</th>
                            <th id="derrota">Der</th>
                            
                        </tr>
                    </thead>
                  
                    <tbody >
                        <?php
                        $player1 = $_GET['player1'];
                        $player2 = $_GET['player2'];
                        include ("./php/bd/controlepdo.php");
                        $conexao = new Conexao();
                        $conexao->InserirPlayer($player1);
                        $conexao->InserirPlayer($player2);
                        
                        ?>
                        <tr>
                            <td  id="guts"><?= $player1 ?></td>
                            <td id="vitoriasGu">0</td>
                            <td id="empateGu">0</td>
                            <td id="derrotasGu">0</td>
                            

                        </tr>
                        <tr>
                            <td id="cavaleira"><?= $player2 ?></td>
                            <td id="vitoriasCa">0</td>
                            <td id="empateCa">0</td>
                            <td id="derrotasCa">0</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>

          


        </div>

        <tbody>
         
        </tbody>

        <button id="resetButton" class="botao" disabled>Reiniciar partida</button>

        <a href="fslogin.php">
        <button id="backLogin" class="botao2">Voltar Pro login</button>
        </a>

        <div>
            <h1 class="player1">Guts</h1>
        </div>

        <div>
            <h1 class="player2">Cavaleira</h1>
        </div>

        <div class="background-container">
            
        </div>

        <div class="fundo">
            <img src="img/teste.gif" alt="">
        </div>


        <!-- smaller red container div -->
        <div style="position: absolute;
            display: flex; 
            width:100%; 
            align-items: center;
            padding: 20px;
            padding-top: 10%;
            padding-left: 5%;">

            <!-- player health -->
            <div style="position: relative;
              width: 100%;
               display: flex; 
               justify-content: flex-end;
               border-top: 4px solid black;
              border-left: 4px solid black;
              border-bottom: 4px solid black;">


                <div style="background-color: red; height: 30px; width: 100%;"></div>

                <div id="playerHealth" style="position: absolute;
                 background: yellow;
                   top: 0;
                   right: 0;
                   bottom: 0;
                   width:100%;
                   "></div>

            </div>


            <!-- timer -->
            <div id="timer" style="background-color:black;
             width: 100px; 
             height: 50px;
             flex-shrink: 0;
             display: flex;
             align-items: center;
             justify-content: center;
             color: white;
             border: 4px solid white;">

                10

            </div>

            <!-- enemy health -->
            <div style="position: relative;
              width: 100%;
              border-top: 4px solid black;
              border-right: 4px solid black;
              border-bottom: 4px solid black;">

                <div style="background-color: red; height: 30px;"></div>

                <div id="enemyHealth" style="position: absolute;
                 background: yellow;
                   top: 0;
                   right: 0;
                   bottom: 0;
                    left: 0;"></div>
            </div>

            <div></div>

        </div>

        <div id="displayText" style="position: absolute;
         color: white; 
         align-items: center;
         justify-content: center;
         top: 10%;
         right: 0;
         bottom: 0;
         left: 6%;
         display: none;
         ">Tie</div>
        <canvas> </canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"
        integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- <script src="./js/nomes.js"></script> -->
        <script src="js/utils.js"></script>
    <script src="js/classes.js"></script>
    <script src="index.js"></script>
    <script src="js/placar.js"></script>
    
    

</body>